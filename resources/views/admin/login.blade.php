<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/admin/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="admin_email" class="block text-sm font-medium text-gray-700">Admin Email</label>
                <input type="email" name="email" id="admin_email" required 
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <div>
                <label for="admin_password" class="block text-sm font-medium text-gray-700">Admin Password</label>
                <input type="password" name="password" id="admin_password" required 
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Login as Admin</button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">Don't have an account? 
            <a href="/register" class="text-blue-500 hover:underline">Register as User</a> or 
            <a href="/admin/create" class="text-blue-500 hover:underline">Register as Admin</a>
        </p>
    </div>
</body>
</html>
