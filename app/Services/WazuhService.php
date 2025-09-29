<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WazuhService
{
    /**
     * Mengambil alerts dari API Wazuh
     */
    public function getAlerts()
    {
        try {
            $url = env('WAZUH_API_URL', 'https://localhost') . ':' . env('WAZUH_API_PORT', '55000') . '/alerts/summary';
            $user = env('WAZUH_API_USER', 'wazuh_user');
            $password = env('WAZUH_API_PASSWORD', 'your_password');

            $response = Http::timeout(5)->withBasicAuth($user, $password)->get($url);

            if ($response->successful()) {
                $data = $response->json();
                return isset($data['data']) ? $data['data'] : $data;
            }
        } catch (\Exception $e) {
            Log::error("Wazuh connection failed: " . $e->getMessage());
        }

        // Return demo data jika koneksi gagal
        return [
            ['id' => 'demo-001', 'description' => 'Demo Alert - SSH Login Failed', 'timestamp' => now()->format('Y-m-d H:i:s')],
            ['id' => 'demo-002', 'description' => 'Demo Alert - File Modified', 'timestamp' => now()->subMinutes(5)->format('Y-m-d H:i:s')]
        ];
    }
}
