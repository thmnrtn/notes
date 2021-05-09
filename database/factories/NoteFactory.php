<?php

use Faker\Generator as Faker;
use App\Note;
use Illuminate\Support\Str;

/**
 * Note factory
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Note::class, function (Faker $faker) {
    return [
        'title' => Str::ucfirst($faker->word),
        'note' => $faker->paragraphs(rand(1, 3), true)
    ];
});
