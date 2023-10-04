<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
/**
* Run the database seeds.
* @return void
*/
public function run()

{
	DB::table('countries')->insert([
        'name' => 'Afghanistan',
		'code' => 'AF',
		'phonecode' => 93,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
	DB::table('countries')->insert([
        'name' => 'Albania',
		'code' => 'AL',
		'phonecode' => 355,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
	DB::table('countries')->insert([
        'name' => 'Algeria',
		'code' => 'DZ',
		'phonecode' => 213,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
	DB::table('countries')->insert([
        'name' => 'American Samoa',
		'code' => 'AS',
		'phonecode' => 1684,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
	DB::table('countries')->insert([
        'name' => 'Andorra',
		'code' => 'AD',
		'phonecode' => 376,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
       ]);
	}
}