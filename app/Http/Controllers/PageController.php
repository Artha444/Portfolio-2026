<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $projects = Project::with('skills')->get();
        $devSkills = Skill::where('type', 'development')->get();
        $toolSkills = Skill::where('type', 'design_tool')->get();

        return view('welcome', compact('projects', 'devSkills', 'toolSkills'));
    }

    public function projects()
    {
        $projects = Project::with('skills')->get();
        return view('projects', compact('projects'));
    }

    public function projectDetail($id)
    {
        $project = Project::with('skills')->findOrFail($id);

        $related = collect();
        $projectsCount = Project::count();
        if ($projectsCount > 1) {
            $related = Project::with('skills')->where('id', '!=', $id)->inRandomOrder()->limit(min(3, $projectsCount - 1))->get();
        }

        return view('project-detail', compact('project', 'related'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return redirect('/#contact')->with('success', 'Pesan Anda berhasil dikirim! Saya akan segera merespons via email.');
    }
}
