<?php

use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->insert([
        	['name'=>'SMS Mobile App', 'images'=>'portfolio_pic1.jpg', 'filter'=>'appleIOS'],
        	['name'=>'Finance App', 'images'=>'portfolio_pic2.jpg', 'filter'=>'design'],
        	['name'=>'GPS Concept', 'images'=>'portfolio_pic3.jpg', 'filter'=>'android'],
        	['name'=>'Shopping', 'images'=>'portfolio_pic4.jpg', 'filter'=>'design'],
        	['name'=>'Managment', 'images'=>'portfolio_pic5.jpg', 'filter'=>'web'],
            ['name'=>'iPhone', 'images'=>'portfolio_pic6.jpg', 'filter'=>'web'],
            ['name'=>'Nexus Phone', 'images'=>'portfolio_pic7.jpg', 'filter'=>'web'],
            ['name'=>'Android', 'images'=>'portfolio_pic8.jpg', 'filter'=>'android']

        ]);
    }
}
