<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DateFormatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       if (\DB::table('date_formats')->count() > 0) {
            return;
        }
      \DB::table('date_formats')->insert([
            ['format' =>'DD/MM/YYYY'],
            ['format' =>'DD.MM.YYYY'],
            ['format' =>'MM/DD/YYYY'],
            ['format' =>'YYYY.MM.DD'],
               ]);
    }
}
