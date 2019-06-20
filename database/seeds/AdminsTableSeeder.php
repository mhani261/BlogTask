<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('admins')->insert([
            'name' => $faker->name,
            'email' =>  'admin@admin.com',
            'password' => Hash::make('102030'),
        ]);
    }
}
