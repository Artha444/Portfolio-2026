<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::truncate();

        $skills = [
            // Development
            ['name' => 'HTML & CSS', 'type' => 'development', 'icon' => 'html', 'color_class' => null],
            ['name' => 'PHP & MySQL', 'type' => 'development', 'icon' => 'database', 'color_class' => null],
            ['name' => 'Laravel Framework', 'type' => 'development', 'icon' => 'terminal', 'color_class' => 'bg-red-500'],
            ['name' => 'JavaScript Dasar', 'type' => 'development', 'icon' => 'javascript', 'color_class' => 'bg-yellow-400'],

            // Design & Tools
            ['name' => 'Git & GitHub', 'type' => 'design_tool', 'icon' => 'fork_right', 'color_class' => null],
            ['name' => 'Visual Studio Code', 'type' => 'design_tool', 'icon' => 'code', 'color_class' => 'bg-blue-500'],
            ['name' => 'XAMPP', 'type' => 'design_tool', 'icon' => 'dns', 'color_class' => null],
            ['name' => 'Figma Dasar', 'type' => 'design_tool', 'icon' => 'draw', 'color_class' => 'bg-purple-500'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}