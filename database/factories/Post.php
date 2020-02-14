<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    // $table->uuid('id');
    //         $table->uuid('user_id');
    //         $table->bigInteger('views')->default(0);
    //         $table->string('thumbnail')->nullable();
    //         $table->text('description')->nullable();
    //         $table->string('path');
    //         $table->timestamps();
    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'description' => $faker->sentence(30)
    ];
});
