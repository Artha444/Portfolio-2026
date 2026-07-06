<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $projects = Project::all();
        $devSkills = Skill::where('type', 'development')->get();
        $toolSkills = Skill::where('type', 'design_tool')->get();

        return view('welcome', compact('projects', 'devSkills', 'toolSkills'));
    }

    public function projects()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    public function projectDetail($id)
    {
        $project = Project::findOrFail($id);

        $related = collect();
        $projectsCount = Project::count();
        if ($projectsCount > 1) {
            $related = Project::where('id', '!=', $id)->inRandomOrder()->limit(min(3, $projectsCount - 1))->get();
        }

        return view('project-detail', compact('project', 'related'));
    }
}