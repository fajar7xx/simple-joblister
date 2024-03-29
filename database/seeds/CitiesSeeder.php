<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://api.rajaongkir.com/starter/city?key=8c15f4aacb756e86f162b20055097a91";
        $json_str = file_get_contents($url);
        $json_obj = json_decode($json_str);
        $cities = [];

        foreach($json_obj->rajaongkir->results as $city){
            $cities[] = [
                'id' => $city->city_id,
                'province_id' => $city->province_id,
                'city' => $city->city_name,
                'type' => $city->type,
                'postal_code' => $city->postal_code,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('cities')->insert($cities);
    }
}
