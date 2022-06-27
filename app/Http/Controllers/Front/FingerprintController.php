<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DB\Fingerprint;

class FingerprintController extends Controller
{
    
    public function store(Request $request){
        
        $cookie_fingerprint = $request->cookie('fp');

        if($cookie_fingerprint == null){

            $fingerprint = Fingerprint::create([
                'fingerprint' => request('fingerprint'),
                'browser' => request('browser'),
                'browser_version' => request('browser_version'),
                'os' => request('os'),
                'os_version' => request('os_version'),
                'resolution' => request('resolution')
            ]);

        }else{
            $fingerprint = Fingerprint::where('fingerprint', $cookie_fingerprint)->first();
        }

        $cookie_fingerprint = cookie()->forever('fp', $fingerprint->fingerprint);

        return response()->json([
            'fingerprint' => request('fingerprint'),
        ])->withCookie($cookie_fingerprint);
    }
}