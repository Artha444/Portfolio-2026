@extends('layouts.admin')

@section('content')
<div class="bg-white p-8 rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Skills</h1>
        <a href="{{ route('admin.skills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Skill</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-3">Name</th>
                <th class="text-left p-3">Type</th>
                <th class="text-left p-3">Icon</th>
                <th class="text-left p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr class="border-b">
                <td class="p-3">{{ $skill->name }}</td>
                <td class="p-3">{{ $skill->type }}</td>
                <td class="p-3">{{ $skill->icon }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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