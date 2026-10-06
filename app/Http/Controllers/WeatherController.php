<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather()
    {
        try {
            $response = Http::timeout(10)
    ->get('https://api.openweathermap.org/data/2.5/weather', [
        'q' => 'Arakan,PH',
        'appid' => env('OPENWEATHER_API_KEY'),
        'units' => 'metric',
    ]); 

            if ($response->failed()) {
                return [
                    'success' => false,
                    'message' => 'Weather service is currently unavailable.',
                    'weather' => null,
                ];
            }

            $data = $response->json();

            if (
                !isset($data['name']) ||
                !isset($data['main']['temp']) ||
                !isset($data['main']['humidity']) ||
                !isset($data['weather'][0]['description']) ||
                !isset($data['wind']['speed'])
            ) {
                return [
                    'success' => false,
                    'message' => 'Weather data is unavailable.',
                    'weather' => null,
                ];
            }

            return [
                'success' => true,
                'message' => null,
                'weather' => [
                    'location' => $data['name'],
                    'temperature' => $data['main']['temp'],
                    'condition' => $data['weather'][0]['description'],
                    'humidity' => $data['main']['humidity'],
                    'wind_speed' => $data['wind']['speed'],
                ],
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => 'Unable to retrieve weather information at this time.',
                'weather' => null,
            ];
        }
    }
}