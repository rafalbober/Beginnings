<?php

use Illuminate\Database\Seeder;

class DeaneriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deaneries')->insert([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@ggios.pl',
            'admin_id' => '000',
            'password' => bcrypt('admin'),
        ]);
    }
}
