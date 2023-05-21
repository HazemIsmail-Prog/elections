<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sections = Section::all();

        // Add all Sections To Admin
        $user = User::find(1);
        $user->sections()->attach($sections->pluck('id'));

        // Create User foreach Section
        foreach ($sections as $section){
            $user = User::create([
                'name' => $section->name,
                'username' => $section->id,
                'password' => bcrypt('F@lah' . $section->id),
            ]);
            $user->sections()->attach($section->id);
            $user->roles()->attach(5);
        }


    }
}
