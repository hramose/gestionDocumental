<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
    //put your code here
    public function run() {
        \DB::table('users')->insert(array(
            "name"=>"Wagner Cadena",
            "email"=>"wcadena@live.com",
            "password"=>\Hash::make("secret")
            
        ));
    }
}
