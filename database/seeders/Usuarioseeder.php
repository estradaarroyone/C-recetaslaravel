<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Usuarioseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name'=>'Ferny',
          'email'=>'fernanda.reyes.carlos@gmail.com',
          'password'=>Hash::make('12345678'),
          'url'=>'http://itszo.com',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
          'name'=>'Marian',
          'email'=>'marifer230914@gmail.com',
          'password'=>Hash::make('12345678'),
          'url'=>'http://itszo.com',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s'),]
        );
    }
}
