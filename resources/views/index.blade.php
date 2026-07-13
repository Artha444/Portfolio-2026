@extends('layouts.admin')

@section('content')
@if(session('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
    <p class="font-bold">Success</p>
    <p>{{ session('success') }}</p>
</div>
@endif
<div class="bg-white p-8 rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New
            Project</a>
    </div>

    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-3">Title</th>
                <th class="text-left p-3">Featured</th>
                <th class="text-left p-3">Category</th>
                <th class="text-left p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr class="border-b @if($project->is_featured) bg-yellow-50 @endif">
                <td class="p-3">{{ $project->title }}</td>
                <td class="p-3">
                    @if($project->is_featured)
                    <span class="text-yellow-500 font-bold">★ Featured</span>
                    @endif
                </td>
                <td class="p-3">{{ $project->category }}</td>
                <td class="p-3">
                    @if(!$project->is_featured)
                    <form action="{{ route('admin.projects.star', $project) }}" method="POST" class="inline-block mr-2">
                        @csrf
                        <button type="submit" class="text-yellow-500">Star ★</button>
                    </form>
                    @endif
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                        class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection