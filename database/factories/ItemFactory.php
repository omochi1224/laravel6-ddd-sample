<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\Omochi\Shop\Domain\Infrastructure\Eloquents\EloquentItem::class, function (Faker $faker) {
    return [
        'id' => (string)\Illuminate\Support\Str::uuid(),
        'name' => $faker->text,
        'price' => $faker->numberBetween(1, 9999999),
        'stock' => $faker->numberBetween(0, 1000)
    ];
});
