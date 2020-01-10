<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => 'admin',
            'id_number' => '000000',
            'email' => 'ggiosdziekanatagh@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
