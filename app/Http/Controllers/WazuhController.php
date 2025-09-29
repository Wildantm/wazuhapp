<?php

namespace App\Http\Controllers;

use App\Services\WazuhService;
use Illuminate\Http\Request;

class WazuhController extends Controller
{
    protected $wazuhService;

    // Dependency injection WazuhService
    public function __construct(WazuhService $wazuhService)
    {
        $this->wazuhService = $wazuhService;
    }

    /**
     * Menampilkan data alerts dari Wazuh
     */
    public function showAlerts(Request $request)
    {
        // Ambil data alerts dari Wazuh
        $alerts = $this->wazuhService->getAlerts();

        // Kirim data ke view jika berhasil, atau tampilkan pesan error
        if ($alerts) {
            return view('wazuh.alerts', compact('alerts'));
        } else {
            return view('wazuh.alerts')->with('error', 'Failed to fetch Wazuh alerts.');
        }
    }

    public function getAlerts()
    {
        $response = Http::withBasicAuth('wazuh_user', 'your_password')->get('http://wazuh-server:55000/alerts');
        if ($response->successful()) {
            // Gunakan Laravel Collection untuk pagination
            $alerts = collect($response->json())->paginate(10);
            return $alerts;
        }

        return null;
    }

}
