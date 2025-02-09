<?php

namespace App\Controllers;

use App\Models\MapsUserModel;

class Maps extends BaseController
{
    public function index()
    {
        echo view('menu/maps'); 
        echo view('menu/footer'); 

    }
    public function getBengkelData()
    {
        $latitude = $this->request->getVar('user_lat');
        $longitude = $this->request->getVar('user_lng');
        $radius = $this->request->getVar('radius');

        if (!$latitude || !$longitude || !$radius) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Parameter tidak lengkap.',
            ])->setStatusCode(400);
        }

        try {
            $bengkelUserModel = new MapsUserModel();

            // Query to get bengkel data within radius
            $query = "
                SELECT id_bengkel, nama_bengkel, alamat_bengkel, latitude, longitude, kontak, deskripsi,
                       (6371 * acos(
                           cos(radians(:latitude:)) *
                           cos(radians(latitude)) *
                           cos(radians(longitude) - radians(:longitude:)) +
                           sin(radians(:latitude:)) *
                           sin(radians(latitude))
                       )) AS distance
                FROM bengkel
                HAVING distance <= :radius:
                ORDER BY distance ASC
            ";

            // Execute query
            $results = $bengkelUserModel->query($query, [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'radius' => $radius,
            ])->getResultArray();

            // Convert distance to number and return response
            foreach ($results as &$bengkel) {
                $bengkel['distance'] = (float) $bengkel['distance']; // Ensure distance is a number
            }

            return $this->response->setJSON([
                'status' => 'success',
                'bengkel' => $results,
            ]);
        } catch (\Exception $e) {
            // Log error for debugging
            log_message('error', 'Error in getBengkelData: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data bengkel.',
            ])->setStatusCode(500);
        }
    }
}
