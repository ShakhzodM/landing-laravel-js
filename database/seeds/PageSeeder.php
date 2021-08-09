<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
        	['name'=>'home', 'alias'=>'home', 'icon'=>'main_device_image.png', 'text'=>'<h2>home page</h2><p>we created home page'],
        	['name'=>'about us', 'alias'=>'aboutUs', 'icon'=>'about-img.jpg', 'text'=>'<h2>about us page</h2><p>we created about us page']

        ]);
    }
}
