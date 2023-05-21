<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sections = [];
        for ($i = 1;    $i <= 4;    $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 1, ];}
        for ($i = 5;    $i <= 8;    $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 2, ];}
        for ($i = 9;    $i <= 18;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 3, ];}
        for ($i = 19;   $i <= 28;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 4, ];}
        for ($i = 29;   $i <= 31;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 5, ];}
        for ($i = 32;   $i <= 34;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 6, ];}
        for ($i = 35;   $i <= 37;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 7, ];}
        for ($i = 38;   $i <= 41;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 8, ];}
        for ($i = 42;   $i <= 47;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 9, ];}
        for ($i = 48;   $i <= 53;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 10,];}
        for ($i = 54;   $i <= 60;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 11,];}
        for ($i = 61;   $i <= 69;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 12,];}
        for ($i = 70;   $i <= 76;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 13,];}
        for ($i = 77;   $i <= 84;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 14,];}
        for ($i = 85;   $i <= 93;   $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 15,];}
        for ($i = 94;   $i <= 103;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 16,];}
        for ($i = 104;  $i <= 113;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 17,];}
        for ($i = 114;  $i <= 123;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 18,];}
        for ($i = 124;  $i <= 135;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 19,];}
        for ($i = 136;  $i <= 147;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 20,];}
        for ($i = 148;  $i <= 149;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 21,];}
        for ($i = 150;  $i <= 152;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 22,];}
        for ($i = 153;  $i <= 162;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 23,];}
        for ($i = 163;  $i <= 173;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 24,];}
        for ($i = 174;  $i <= 181;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 25,];}
        for ($i = 182;  $i <= 190;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 26,];}
        for ($i = 191;  $i <= 195;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 27,];}
        for ($i = 196;  $i <= 201;  $i++) {$sections[] = ['id' => $i,'name' => 'لجنة ' . $i,'school_id' => 28,];}
        Section::insert($sections);
    }
}