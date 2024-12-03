<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create Admin</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.create.submit') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required 
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required 
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required 
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required 
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Create Admin</button>
        </form>
        <p class="mt-6 text-sm text-center text-gray-600">Already have an account? 
            <a href="/admin/login" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
