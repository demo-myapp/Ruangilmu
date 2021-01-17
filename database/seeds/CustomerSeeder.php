<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
            'phone_number' => '099999999995',
            'status' => 1
        ]);
    }
}
