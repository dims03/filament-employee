<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
/**
* Run the database seeds.
*/
public function run(): void
{
//
DB::table('countries')->insert([
    'country_id' => 101,
    'name' => 'Andaman and Nicobar Island',
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s')
   ]);
}
}