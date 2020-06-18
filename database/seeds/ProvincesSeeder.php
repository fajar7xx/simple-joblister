<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://api.rajaongkir.com/starter/province?key=8c15f4aacb756e86f162b20055097a91";
        $json_str  = file_get_contents($url);
        $json_obj = json_decode($json_str);
        $provinces = [];

        foreach($json_obj->rajaongkir->results as $province){
            $provinces[] = [
                'id' => $province->province_id,
                'province' => $province->province,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('provinces')->insert($provinces);
    }
}
