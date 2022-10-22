<?php

use Illuminate\Database\Seeder;
use App\Settings;

class Settings_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'site_name'=>'Sabaya.Fitness',
            'phone_number'=>'(963) 964 827 090',
            'email'=>'Sabaya.Fitness@gmail.com',
            'address'=>'The Main Dablan Street',
            'open_days'=>'Mon - Fri: 6:30am - 07:45pm'
        ]);
    }
}
