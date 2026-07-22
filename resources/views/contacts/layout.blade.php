<!--
Behzad Ghabaei
CS 85 PHP
Module 9 Assignment 9A
Instructor Seno
7/21/2026
-->

<!DOCTYPE html>                                                 <!-- Declares the document type as standard HTML5 -->
<html lang="en">                                                <!-- Sets the primary language of the document to English -->
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])     <!-- Loads the local CSS and JavaScript bundles using Laravel Vite -->

    <meta charset="UTF-8">                                      <!-- Configures character encoding to support all text characters -->
    <title>Contact List App</title>                             <!-- Sets the text that shows up on the browser tab -->
    <script src="https://tailwindcss.com"></script>             <!-- Dynamically imports the Tailwind CSS framework via CDN, https://tailwindcss.com/docs/installation/using-vite    https://www.sitepoint.com/tailwind-css-in-react-and-nextjs/-->
</head>
<body class="bg-gray-100 p-6">                                  <!-- Applies a light gray background and general outer padding to the page -->
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow"> <!-- Creates a centered white card layout container with rounded borders and shadows -->
        @if(session('success'))                                 <!-- Checks if a success notification flash message exists in the session -->
            <div class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>     <!-- Displays a green notification box filled with the success message text -->
        @endif                                                  <!-- Closes the flash message logical check block -->
        @yield('content')                                       <!-- Reserves a placeholder slot where child Blade template views inject their content -->
    </div>
</body>
</html>

