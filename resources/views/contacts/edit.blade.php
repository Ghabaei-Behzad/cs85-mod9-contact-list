{{--
Behzad Ghabaei
CS 85
Module 9 Assign 9A
Instructor Seno 
7/21/2026
--}}

@extends('contacts.layout')                                                                     {{-- Inherits and wraps this content inside the main contacts.layout structural file --}}

@section('content')                                                                             {{-- Opens the template block matching the yield slot in the layout file --}}
<h1 class="text-2xl font-bold mb-4">Edit Contact</h1>                                           {{-- Displays a prominent large title heading for the update page --}}
<form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="space-y-4">    {{-- Builds the form wrapper targeting the update route with the current contact's ID, adding layout spacing between elements --}}
    @csrf @method('PUT')                                                                        {{-- Generates a mandatory underlying system encryption key protection pass token and directs the standard web form layout to mask its submission header as a PUT intent --}}
    <div>
        <label class="block">Name</label>                                                       {{-- Displays a text label element stacked directly above the input box --}}
        <input type="text" name="name" value="{{ old('name', $contact->name) }}" class="w-full border p-2 rounded">      {{-- Displays a full-width text field pre-filled with corrected submission data or fallback database details --}}
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror             {{-- Intercepts any name validation failures passed back from the controller validation rules and displays the precise automated system validation error text message in red and finally closes out the name field error tracking layout block --}}
    <div>
        <label class="block">Email</label>                                                      {{-- Displays a text label element stacked directly above the email input box --}}
        <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="w-full border p-2 rounded">       {{-- Renders a full-width email field pre-filled with corrected submission data or fallback database details --}}
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror            {{-- Intercepts any email validation failures passed back from the controller validation rules and displays the precise automated system validation error text message in red and finally closes out the email field error tracking layout block --}}
    </div>
    <div>
        <label class="block">Phone</label>                                                      {{-- Displays a text label element stacked directly above the phone input box --}}
        <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" class="w-full border p-2 rounded">     {{-- Renders a full-width phone text field pre-filled with corrected submission data or fallback database details --}}
        @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror            {{-- Intercepts any phone validation failures passed back from your controller validation rules and displays the precise automated system validation error text message in red and finally closes out the phone field error tracking layout block --}}
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>      {{-- Renders a blue action button to trigger the form processing update submission event --}}
</form>                                                                                         {{-- Closes the form payload module wrapper --}}
@endsection                                                                                     {{-- Concludes the primary layout block area content wrapper payload script --}}



