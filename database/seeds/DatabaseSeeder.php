<?php

use App\Category;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $this->call(AdminsTableSeeder::class);

        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([
                'title' => $faker->domainWord,
                'created_at'=>Carbon\Carbon::now(),
            ]);
        }
        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('posts')->insert([
                'category_id'=>rand(1,4),
                'title'=>$faker->sentence,
                'description'=>$faker->sentence,
                'details'=>$faker->sentence,
                'created_at'=>Carbon\Carbon::now(),
            ]);


        }

    }
}
