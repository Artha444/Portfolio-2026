@extends('layouts.admin')

@section('content')
<div class="bg-white p-8 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Add New Skill</h1>

    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700">Type</label>
            <select name="type" id="type" class="w-full border rounded px-3 py-2" required>
                <option value="development">Development</option>
                <option value="design_tool">Design & Tool</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="icon" class="block text-gray-700">Icon Name</label>
            <input type="text" name="icon" id="icon" class="w-full border rounded px-3 py-2" placeholder="e.g., html" required>
            <p class="text-sm text-gray-500 mt-1">Use name from <a href="https://fonts.google.com/icons" target="_blank" class="text-blue-500 underline">Material Symbols</a>.</p>
        </div>

        <div class="mb-4">
            <label for="color_class" class="block text-gray-700">Dot Color Class (Optional)</label>
            <input type="text" name="color_class" id="color_class" class="w-full border rounded px-3 py-2" placeholder="e.g., bg-red-500">
            <p class="text-sm text-gray-500 mt-1">Tailwind CSS class for the colored dot.</p>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="text-gray-500 ml-4">Cancel</a>
        </div>
    </form>
</div>
@endsection