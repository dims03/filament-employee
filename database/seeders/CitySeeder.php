<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * the cities is large, we need to break it in part
     * @return void
     */
    public function run()
    {
        //
       DB::table('cities')->insert([
        'state_id' => 1,
        'name' => 'Bombbuflat',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 1,
        'name' => 'Garacharma',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 1,
        'name' => 'Port Blair',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 1,
        'name' => 'Rangat',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 2,
        'name' => 'Addanki',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 2,
        'name' => 'Adivivaram',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 2,
        'name' => 'Adoni',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 2,
        'name' => 'Aganampudi',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 2,
        'name' => 'Ajjaram',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
       DB::table('cities')->insert([
        'state_id' => 2,
        'name' => 'Akividu',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
    }
}
