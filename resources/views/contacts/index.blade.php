@extends('contacts.layout')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Contacts</h1>
    <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Contact</a>
</div>
<table class="w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">Name</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Phone</th>
            <th class="border p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td class="border p-2">{{ $contact->name }}</td>
            <td class="border p-2">{{ $contact->email }}</td>
            <td class="border p-2">{{ $contact->phone }}</td>
            <td class="border p-2 flex gap-2">
                <a href="{{ route('contacts.edit', $contact->id) }}" class="text-yellow-600">Edit</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Delete this contact?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
