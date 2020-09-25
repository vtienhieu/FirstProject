<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          'name' => 'vtienhieu',
          'email' =>'tienhieuvip@gmail.com',
          'password' =>bcrypt('123456'),
        ];
        DB::table('users')->insert($data);
    }
}
