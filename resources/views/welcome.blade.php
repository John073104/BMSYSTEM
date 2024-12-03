<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Web Development BMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    
    <style>
        html {
            scroll-behavior: smooth; /* Enable smooth scrolling */
        }
    </style>
</head>
<body class="font-roboto bg-white text-gray-800">
    <header class="flex justify-between items-center p-6">
        <div class="flex items-center">
            <img alt="Logo of BMS" class="h-20 w-20" height="100" src="{{ asset('/img/MacatocBMS.png') }}" width="100"/>
            <span class="ml-8 text-2xl font-bold">THE PROJECT BMS</span>
        </div>
        <nav class="flex space-x-6 text-gray-600">
            <a class="hover:text-gray-800" href="#all-paths">All Paths</a>
            <a class="hover:text-gray-800" href="#about">About</a>
            <a class="hover:text-gray-800" href="#community">Community</a>
            <a class="hover:text-gray-800" href="#support">Support us</a>
            <a class="bg-green-600 text-white px-4 py-2 rounded hover:bg-blue-700" href="/register">Register</a> 
            <a class="bg-green-600 text-white px-4 py-2 rounded hover:bg-blue-700" href="/login">Login</a> 
        </nav>
    </header>
   
   

    <main class="text-center mt-20">
        <h1 class="text-5xl font-bold text-gray-900" id="all-paths">
        Transforming Local Governance with Smart Management Solutions.
            <br/>
            <span class="text-yellow-600"> Welcome to Project BMS</span>
        </h1>
        <p class="mt-4 text-lg text-gray-600">
        Enhancing Collaboration and Communication Among Community Stakeholders.
        </p>
        <div class="container mx-auto">
        <h2 class="text-2xl font-bold">Building a Stronger, More Connected Community for All.</h2>
        <a href="/admin/login">
        <button class="mt-8 px-6 py-3 border border-gray-300 rounded text-gray-700 hover:bg-gray-100">
            Admin Login Here
        </button>
    </a>
</div>
        <div class="mt-20">
            <img alt="Illustration of buildings with various tech logos" class="mx-auto" height="400" src="https://storage.googleapis.com/a1aa/image/AHhK7P9ZWfyGCyzwbXkeyLTOeaELtP1sV1pPdULZpe9y7SQPB.jpg" width="800"/>
        </div>
        
        <!-- About Section -->
        <div class="mt-10" id="about">
            <h2 class="text-3xl font-bold">About Us</h2>
            <p class="mt-2 text-gray-600">We are dedicated to providing the best resources for web development.</p>
        </div>

        <!-- Community Section -->
        <div class="mt-10" id="community">
            <h2 class="text-3xl font-bold">Community</h2>
            <p class="mt-2 text-gray-600">Join our community to collaborate and learn together.</p>
        </div>

        <!-- Support Us Section -->
        <div class="mt-10" id="support">
            <h2 class="text-3xl font-bold">Support Us</h2>
            <p class="mt-2 text-gray-600">Help us improve our platform by supporting our initiatives.</p>
        </div>
    </main>
</body>
</html>