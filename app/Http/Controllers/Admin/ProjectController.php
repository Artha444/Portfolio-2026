<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Project::count() >= 5) {
            return redirect()->route('admin.projects.index')->with('error', 'Maksimal 5 projek yang diperbolehkan.');
        }
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Project::count() >= 5) {
            return redirect()->route('admin.projects.index')->with('error', 'Maksimal 5 projek yang diperbolehkan.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'required|string',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'board_position' => 'nullable|string|in:none,center,top_left,top_right,bottom_left,bottom_right',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // Naikkan batas ke 10MB
            // Untuk create: bentuknya index dari input radio
            'cover_image_index' => 'nullable|integer'
        ]);

        $tags = array_map('trim', explode(',', $request->tags));

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $imagePaths[] = $path;
            }
        }

        $boardPosition = $request->board_position ?? 'none';

        if ($boardPosition !== 'none') {
            Project::where('board_position', $boardPosition)->update(['board_position' => 'none']);
        }

        $coverIndex = $request->input('cover_image_index');
        Project::create([
            'title' => $request->title,
            'category' => $request->category,
            'tags' => $tags,
            'description' => $request->description,
            'link' => $request->link,
            'board_position' => $boardPosition,
            'images' => $imagePaths,
            'cover_image' => ($coverIndex !== null && isset($imagePaths[(int) $coverIndex]))
                ? $imagePaths[(int) $coverIndex]
                : ($imagePaths[0] ?? null),
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'required|string',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'board_position' => 'nullable|string|in:none,center,top_left,top_right,bottom_left,bottom_right',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // Naikkan batas ke 10MB
            'cover_image' => 'nullable|string', // Path dari gambar yang dipilih sebagai cover
            'existing_images' => 'nullable|array', // Array dari gambar yang sudah ada
        ]);


        $tags = array_map('trim', explode(',', $request->tags));

        $boardPosition = $request->board_position ?? 'none';

        if ($boardPosition !== 'none' && $project->board_position !== $boardPosition) {
            Project::where('board_position', $boardPosition)->update(['board_position' => 'none']);
        }

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'tags' => $tags,
            'description' => $request->description,
            'link' => $request->link,
            'board_position' => $boardPosition,
        ];

        // --- LOGIKA GAMBAR YANG DISEDERHANAKAN ---

        // 1. Ambil daftar gambar yang ada (yang tidak dihapus dari form)
        $currentImagePaths = $request->input('existing_images', []);

        // 2. Bandingkan dengan gambar lama di DB untuk menemukan gambar yang harus dihapus dari storage
        $oldImages = $project->images ?? [];
        $imagesToDelete = array_diff($oldImages, $currentImagePaths);
        if (!empty($imagesToDelete)) {
            Storage::disk('public')->delete($imagesToDelete);
        }

        // 3. Proses dan simpan gambar baru yang di-upload
        $newImagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $newImagePaths[] = $path;
            }
        }

        // 4. Gabungkan gambar lama (yang tersisa) dengan gambar baru
        $finalImagePaths = array_merge($currentImagePaths, $newImagePaths);
        $data['images'] = $finalImagePaths;

        // 5. Logika cover image yang andal
        $selectedCover = $request->input('cover_image');

        if (!empty($selectedCover) && str_starts_with($selectedCover, 'new_')) {
            // Cover yang dipilih adalah gambar BARU (misal: "new_0", "new_1")
            $newImageIndex = (int) str_replace('new_', '', $selectedCover);
            $data['cover_image'] = $newImagePaths[$newImageIndex] ?? ($finalImagePaths[0] ?? null);
        } elseif (!empty($selectedCover) && in_array($selectedCover, $finalImagePaths)) {
            // Cover yang dipilih adalah gambar LAMA yang valid dan masih ada
            $data['cover_image'] = $selectedCover;
        } elseif (!empty($project->cover_image) && in_array($project->cover_image, $finalImagePaths)) {
            // Pertahankan cover lama jika masih ada di daftar gambar final
            $data['cover_image'] = $project->cover_image;
        } else {
            // Fallback: gunakan gambar pertama yang tersedia
            $data['cover_image'] = $finalImagePaths[0] ?? null;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!empty($project->images)) {
            foreach ($project->images as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
