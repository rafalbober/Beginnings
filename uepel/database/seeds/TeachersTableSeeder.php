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
            'teacher_id' => '00023',
            'password' => bcrypt('hahaha'),
        ]);
    }
}
