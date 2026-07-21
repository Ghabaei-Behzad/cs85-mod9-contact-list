@extends('contacts.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Contact</h1>
<form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded">
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded">
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block">Phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border p-2 rounded">
        @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
