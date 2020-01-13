<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'Rafał',
            'surname' => 'Świstak',
            'email' => 'hehe@xd.pl',
            'index' => '298000',
            'password' => bcrypt('hehe'),
        ]);
    }
}
