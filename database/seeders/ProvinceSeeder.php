<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use GuzzleHttp\Exception\RequestException;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Inisialisasi GuzzleHTTP client dengan verifikasi SSL dinonaktifkan
        $client = new Client([
            'verify' => false,
        ]);
        $data_province = [];
        try {
            // Melakukan permintaan GET ke endpoint RajaOngkir
            $response = $client->get('https://api.rajaongkir.com/starter/province', [
                'headers' => [
                    'key' => 'cbcb8b2cf1a94f656a902e26d7b8967c'
                ]
            ]);

            // Mendapatkan tubuh (body) respon dalam bentuk string
            $data = $response->getBody()->getContents();

            // Mengubah JSON string menjadi array asosiatif
            $dataArray = json_decode($data, true);

            // Mendapatkan hasil (results) dari respon
            $provinces = $dataArray['rajaongkir']['results'];

            // Mengembalikan data hasil sebagai respon
            foreach ($provinces as $province) {
                $data_province[] = [
                    'id' => $province['province_id'],
                    'province' => $province['province'],
                ];
            }
            Province::insert($data_province);
        } catch (RequestException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
