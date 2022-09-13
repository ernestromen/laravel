<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Countries;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
            "user_id"=>"1",
            "name"=>"john smith",
            "iso" => "USD",
            "created_at"=>now(),
            "updated_at"=>now(),

        ],
        [
            "user_id"=>"1",
            "name"=>"john henderson",
            "iso" => "GBB",
            "created_at"=>now(),
            "updated_at"=>now(),            
        ],
        [
        "user_id"=>"1",
        "name"=>"jacpb matters",
        "iso" => "IL",
        "created_at"=>now(),
        "updated_at"=>now(),
        ],
        [
            "user_id"=>"2",
            "name"=>"thomas something",
            "iso" => "AUD",
            "created_at"=>now(),
            "updated_at"=>now(),
        ],
        [
            "user_id"=>"2",
            "name"=>"rick ross",
            "iso" => "NZD",
            "created_at"=>now(),
            "updated_at"=>now(),
            ]
    ];

    foreach($countries as $country){
        Countries::create($country);

    }

    }
}
