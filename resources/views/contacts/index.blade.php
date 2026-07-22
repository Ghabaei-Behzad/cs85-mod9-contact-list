{{--
Behzad Ghabaei
CS 85 PHP
Module 9 Assignment 9A
Instructor Seno 
7/21/2026
--}}


@extends('contacts.layout')                               {{-- Inherits and wraps this content inside your main contacts.layout structural file --}}

@section('content')                                       {{-- Opens the template block matching the yield slot in your layout file --}}
<div class="flex justify-between items-center mb-4">      {{-- Sets up a flexible horizontal layout row that pushes title and button to opposite sides --}}
    <h1 class="text-2xl font-bold">Contacts</h1>          {{-- Renders a prominent large title heading for your main page --}}
    <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Contact</a>     {{-- Renders a blue button containing a link pointing to your form creation route --}}
</div>                                                    {{-- Closes the title and creation action wrapper row block --}}
<table class="w-full border-collapse border border-gray-300"> {{-- Renders a full-width HTML data table complete with gray border formatting lines --}}
    <thead>
        <tr class="bg-gray-200">                          {{-- Applies a light gray background color to the entire column header row --}}
            <th class="border p-2">Name</th>              {{-- Generates individual bordered columns for tracking names, emails, phones, and buttons --}}
            <th class="border p-2">Email</th>
            <th class="border p-2">Phone</th>
            <th class="border p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)                   {{-- Commences a looping structure passing over every entry in the data collection variable --}}
        <tr>
            <td class="border p-2">{{ $contact->name }}</td>       {{-- Prints out the clear text database property assigned to the current contact's name --}}
            <td class="border p-2">{{ $contact->email }}</td>      {{-- Prints out the clear text database property assigned to the current contact's email --}}
            <td class="border p-2">{{ $contact->phone }}</td>      {{-- Prints out the clear text database property assigned to the current contact's phone --}}
            <td class="border p-2 flex gap-2">                     {{-- Groups action items tightly side by side utilizing layout spacer properties --}}
                <a href="{{ route('contacts.edit', $contact->id) }}" class="text-yellow-600">Edit</a>      {{-- Creates an orange text shortcut route carrying this loop instance ID to the edit menu --}} 
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Delete this contact?');">      {{-- Builds a hidden submit wrapper target addressing the controller deletion endpoint with a pop-up confirmation alert --}}
                    @csrf @method('DELETE')                        {{-- Generates a mandatory underlying system encryption key protection pass token and directs the standard web form layout to mask its submission header as a DELETE intent --}}
                    <button type="submit" class="text-red-600">Delete</button>    {{-- Renders a clickable red submission control button to drop the record sequence line --}}
                </form>                                            {{-- Closes the standalone data item deletion structure module wrapper --}}
            </td>
        </tr>
        @endforeach                                                {{-- Instructs the loop block engine sequence to close out completely --}}
    </tbody>
</table>
@endsection                                                        {{-- Concludes the primary layout block area content wrapper payload script --}}
