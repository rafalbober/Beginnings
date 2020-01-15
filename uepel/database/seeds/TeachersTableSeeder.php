<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => 'Zdzisław',
            'surname' => 'Uwodziciel',
            'email' => 'siwy@ggios.pl',
            'password' => bcrypt('hahaha'),
        ]);

        DB::table('teachers')->insert([
            'name' => 'test',
            'surname' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ]);
    }
}
