<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // UsersTableSeeder::class,
            UserSeeder::class,
        ]);

        $newDataCountry = new Country;
        $newDataCountry->name =  'Indonesia';
        $newDataCountry->save();

        $newDataProvince = new Province;
        $newDataProvince->name =  'Jawa';
        $newDataProvince->country_id = 1;
        $newDataProvince->man_population =  5000000;
        $newDataProvince->woman_population =  4200000;
        $newDataProvince->save();

        $newDataProvince = new Province;
        $newDataProvince->name =  'Kalimantan';
        $newDataProvince->country_id = 1;
        $newDataProvince->man_population =  6000000;
        $newDataProvince->woman_population =  5500000;
        $newDataProvince->save();

        $newDataProvince = new Province;
        $newDataProvince->name =  'Sumatra';
        $newDataProvince->country_id = 1;
        $newDataProvince->man_population =  4000000;
        $newDataProvince->woman_population =  3700000;
        $newDataProvince->save();
    }
}
