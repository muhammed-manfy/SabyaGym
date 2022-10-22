<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use PhpParser\Node\Expr\Cast\Double;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'image' => $faker->sentence(3),
        'full_name' => $faker->sentence(3),
        'phone' => $faker->phoneNumber,
        'birthday' => $faker->now(),
        'salary' => $faker->doubleval,
        'certificate' => $faker->sentence(3),
        'user_id' => 1,
    ];
});

$factory->define(App\Coach::class, function (Faker $faker) {
    return [
        'image' => $faker->sentence(3),
        'full_name' => $faker->sentence(3),
        'phone' => $faker->phoneNumber,
        'birthday' => $faker->now(),
        'hours_cost' => $faker->doubleval,
        'hours_work' => $faker->doubleval,
        'salary' => $faker->doubleval,
        'certificate' => $faker->sentence(3),
        'admin_id' => 1,
    ];
});

$factory->define(App\Cleaner::class, function (Faker $faker) {
    return [
        'image' => $faker->sentence(3),
        'full_name' => $faker->sentence(3),
        'phone' => $faker->phoneNumber,
        'birthday' => $faker->now(),
        'salary' => $faker->doubleval,
        'admin_id' => 1,
    ];
});


$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'image' => $faker->sentence(3),
        'sport_type' => $faker->sentence(3),
        'subscribe_type' => $faker->sentence(4),
        'time_start' => time(),
        'time_end' => time(),
        'published_at' => $faker->now(),
        'ended_at' => $faker->now(),
        'subscribe_cost' => $faker->doubleval,
        'coach_id' => 1
    ];
});

$factory->define(App\Device::class, function (Faker $faker) {
    return [
        'image' => $faker->sentence(3),
        'type' => $faker->sentence(3),
        'num_of_devices' => intval(10),
        'course_id' => 1,
    ];
});

$factory->define(App\Advert::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'context' => $faker->paragraph(4),
        'discount_rate' => doubleValue(),
        'admin_id' => 1,
        'course_id' => 1
    ];
});


$factory->define(App\Trainee::class, function (Faker $faker) {
    return [
        'image' => $faker->sentence(3),
        'full_name' => $faker->sentence(3),
        'phone' => $faker->phoneNumber,
        'birthday' => $faker->now(),
        'work_place' => $faker->sentence(3),
        'user_id' => 2
    ];
});

$factory->define(App\Medical::class, function (Faker $faker) {
    return [
        'hospital_name' => $faker->sentence(3),
        'previous_operation' => $faker->sentence(3),
        'disases' => $faker->sentence(3),
        'trainee_id' => 1
    ];
});
