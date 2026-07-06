@extends('layouts.admin')

@section('content')
<div class="bg-white p-8 rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Project</a>
    </div>

    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-3">Title</th>
                <th class="text-left p-3">Category</th>
                <th class="text-left p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr class="border-b">
                <td class="p-3">{{ $project->title }}</td>
                <td class="p-3">{{ $project->category }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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