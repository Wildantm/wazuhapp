<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WazuhWebhookController extends Controller
{
    public function receiveAlert(Request $request)
    {
        $alert = $request->all();
        
        Log::info('Wazuh Alert Received:', $alert);
        
        // Simpan alert ke database
        Alert::create([
            'alert_id' => $alert['id'] ?? null,
            'rule_id' => $alert['rule']['id'] ?? null,
            'level' => $alert['rule']['level'] ?? null,
            'description' => $alert['rule']['description'] ?? null,
            'agent_name' => $alert['agent']['name'] ?? null,
            'alert_timestamp' => $alert['timestamp'] ?? now(),
            'data' => $alert
        ]);
        
        return response()->json(['status' => 'received'], 200);
    }
}