<?php

namespace App\Models;

use CodeIgniter\Model;

class MapsUserModel extends Model
{
    protected $table = 'bengkel';

    /**
     * Get bengkel data within a specific radius
     *
     * @param float $userLat Latitude of user's location
     * @param float $userLng Longitude of user's location
     * @param int $radius Radius in kilometers
     * @return array List of bengkel within radius
     */
    public function getBengkelInRadius($userLat, $userLng, $radius)
    {
        $radiusInKm = $radius;

        // SQL Haversine formula to calculate distance
        $query = $this->db->query("
            SELECT 
                id_bengkel,
                nama_bengkel,
                alamat_bengkel,
                latitude,
                longitude,
                kontak,
                deskripsi,
                (
                    6371 * acos(
                        cos(radians(:userLat:)) * 
                        cos(radians(latitude)) * 
                        cos(radians(longitude) - radians(:userLng:)) + 
                        sin(radians(:userLat:)) * 
                        sin(radians(latitude))
                    )
                ) AS distance
            FROM bengkel
            HAVING distance <= :radiusInKm:
            ORDER BY distance ASC
        ", [
            'userLat' => $userLat,
            'userLng' => $userLng,
            'radiusInKm' => $radiusInKm
        ]);

        return $query->getResultArray();
    }
}
