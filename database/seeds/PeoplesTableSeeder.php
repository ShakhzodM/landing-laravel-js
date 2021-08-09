<?php

use Illuminate\Database\Seeder;

class PeoplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peoples')->insert([
        	['name'=>'Tom Rensed', 'position'=>'Chief Executive Officer','image'=>'team_pic1.jpg', 'text'=>'team1'],
        	['name'=>'Clark Tomson', 'position'=>'Postman Officer', 'image'=>'team_pic2.jpg', 'text'=>'team2'],
        	['name'=>'Kathren Mory', 'position'=>'Police Officer', 'image'=>'team_pic3.jpg', 'text'=>'team3']
        ]);
    }
}
