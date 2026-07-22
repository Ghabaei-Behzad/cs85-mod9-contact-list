{{--
Behzad Ghabaei
CS 85 PHP
Module 9 Assign 9A
Instructor section
7/21/2026
--}}

@extends('contacts.layout')                                                                               {{-- Inherits and wraps this content inside the main contacts.layout structural file --}}

@section('content')                                                                                       {{-- Opens the template block matching the yield slot in the layout file --}}
<h1 class="text-2xl font-bold mb-4">Add Contact</h1>                                                      {{-- Renders a prominent large title heading for the creation page --}}
<form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">                             {{-- Builds the form wrapper targeting the store creation route, adding layout spacing between elements --}}
    @csrf                                                                                                 {{-- Generates a mandatory underlying system encryption key protection pass token --}}
    <div>
        <label class="block">Name</label>                                                                 {{-- Displays a text label element stacked directly above the input box --}}
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded">       {{-- Renders a blank full-width text field that retains typing if validation fails on submission --}}
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror                       {{-- Intercepts any name validation failures passed back from the controller validation rules and displays the precise automated system validation error text message in red and finally closes out the name field error tracking layout block --}}
    </div>
    <div>
        <label class="block">Email</label>                                                                {{-- Displays a text label element stacked directly above the email input box --}}
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded">    {{-- Renders a blank full-width email field that retains typing if validation fails on submission --}}
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror                      {{-- Intercepts any email validation failures passed back from the controller validation rules and displays the precise automated system validation error text message in red and finally closes out the email field error tracking layout block --}}
    </div>
    <div>
        <label class="block">Phone</label>                                                                {{-- Displays a text label element stacked directly above the phone input box --}}
        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border p-2 rounded">     {{-- Renders a blank full-width phone text field that retains typing if validation fails on submission --}}
        @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror                      {{-- Intercepts any phone validation failures passed back from your controller validation rules and displays the precise automated system validation error text message in red and finally closes out the phone field error tracking layout block --}}
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>                  {{-- Renders a blue action button to trigger the form processing creation submission event --}}
</form>                                                                                                   {{-- Closes the form payload module wrapper --}}
@endsection                                                                                               {{-- Concludes the primary layout block area content wrapper payload script --}}

