<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;


class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(['language_name'=>'English']);
        Language::create(['language_name'=>'Malayalam']);
        Language::create(['language_name'=>'Tamil']);
        Language::create(['language_name'=>'Hindi']);

    }
}
