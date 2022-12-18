<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\App;


class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        Setting::create([
        'site_name'=>"laravel's",
        'contact_number'=>'01768603251',
        'contact_email'=>'asraful9355@gmail.com',
        'address'=>'Shahzadpur,Sirajganj,Dhaka'

           
        
        
        
    ]);

       
    }
}
