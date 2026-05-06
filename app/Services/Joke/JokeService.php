<?php

namespace App\Services\Joke;

use App\Models\Joke;
use Illuminate\Support\Facades\Http;

class JokeService implements \App\Services\ServiceInterface
{
    const API_URL = 'https://official-joke-api.appspot.com/random_joke';

    public function getRandomJoke()
    {
        try {
            $response = Http::get(self::API_URL);
            
            if ($response->successful()) {
                return $response->json();
            }
            
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function saveJoke(array $data)
    {
        try {
            return Joke::create([
                'type' => $data['type'],
                'setup' => $data['setup'],
                'punchline' => $data['punchline'],
            ]);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getAllJokes()
    {
        try {
            return Joke::all();
        } catch (\Exception $e) {
            return collect();
        }
    }
}