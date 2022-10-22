<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class SettingTableSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
            'site_name'=>'Sabaya.Fitness',
            'phone_number'=>'(963) 964 827 090',
            'email'=>'Sabaya.Fitness@gmail.com',
            'address'=>'The Main Dablan Street',
            'open_days'=>'Mon - Fri: 6:30am - 07:45pm'
        ]);
        \App\Setting::create([
            'site_name' => 'Sabaya GYM',
            'contact_number' => '0987654321',
            'contact_email' => 'info@gym.com',
            'address' => 'HOMS',
            'about' => 'this website is about sport ',
        ]);
        \App\User::create([
            'name' => 'salam',
            'email' => 'salamalshami@gmail.com',
            'email_verified_at' => now(),
            'password' => 'salamalshami', // password
            'admin' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
