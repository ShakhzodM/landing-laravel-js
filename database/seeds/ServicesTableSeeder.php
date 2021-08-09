<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
        	['name'=>'Android', 'icon'=>'fa-android', 'text'=>'We had ...'],
        	['name'=>'Apple IOS', 'icon'=>'fa-apple', 'text'=>'We were ...'],
        	['name'=>'Design', 'icon'=>'fa-html5', 'text'=>'We are ...'],
        	['name'=>'Concept', 'icon'=>'fa-dropbox', 'text'=>'We have ...'],
        	['name'=>'User Research', 'icon'=>'fa-slack', 'text'=>'We have a service ...'],
        	['name'=>'User Experience', 'icon'=>'fa-users', 'text'=>'We had a application ...'],
        ]);
 
    }
}
