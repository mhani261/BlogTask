<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id'=>function(){
            return factory(App\Category::class)->create()->id;
        },
        'title'=>$faker->sentence,
        'description'=>$faker->sentence,
        'details'=>$faker->sentence
    ];
});
