<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MarvelController extends Controller
{
    //
    public function index()
    {
        $timestamp = time();
        $publicKey = '0619e08fc3cfe0be788605af1e0f43c6';
        $privateKey = '40e763d39f54a411249badfa11ac475b17c069eb';
        $hash = md5($timestamp . $privateKey . $publicKey);

        $response = Http::get('https://gateway.marvel.com/v1/public/characters', [
            'apikey' => $publicKey,
            'ts'=> $timestamp,
            'hash'=>$hash,
        ]);

        if ($response->successful()) {
            $characters = $response->json()['data']['results'];

            return view('marvel.index', ['characters' => $characters]);
        } else {
            $error = $response->json();
            \Log::error('Marvel API error: ' . json_encode($error));
            return redirect()->route('home.index');
        }
    }
}
