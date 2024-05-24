<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log; // Import Log facade
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inisialisasi GuzzleHTTP client dengan verifikasi SSL dinonaktifkan
        $client = new Client([
            'verify' => false,
        ]);
        $data_cities = [];
        try {
            // Melakukan permintaan GET ke endpoint RajaOngkir
            $response = $client->get('https://api.rajaongkir.com/starter/city', [
                'headers' => [
                    'key' => 'cbcb8b2cf1a94f656a902e26d7b8967c'
                ]
            ]);

            // Mendapatkan tubuh (body) respon dalam bentuk string
            $data = $response->getBody()->getContents();

            // Mengubah JSON string menjadi array asosiatif
            $dataArray = json_decode($data, true);

            // Mendapatkan hasil (results) dari respon
            $cities = $dataArray['rajaongkir']['results'];

            // Mengembalikan data hasil sebagai respon
            foreach ($cities as $city) {
                $data_cities[] = [
                    'id' => $city['city_id'],
                    'province_id' => $city['province_id'],
                    'type' => $city['type'],
                    'city_name' => $city['city_name'],
                    'postal_code' => $city['postal_code'],
                ];
            }
            City::insert($data_cities);
        } catch (RequestException $e) {
            Log::error("Error: " . $e->getMessage());
        }
    }
}
