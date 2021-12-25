<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NumberFormatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if (\DB::table('number_formats')->count() > 0) {
            return;
        }

      \DB::table('number_formats')->insert([
            ['format' =>'XXX,XXX.XXX'],
            ['format' =>'XX,XXX.XXX'],
            ['format' =>'X,XXX.XXX'],
            ['format' =>'XXX,XXX'],
               ]);

    }
}
