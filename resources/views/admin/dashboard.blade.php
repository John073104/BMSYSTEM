<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- Laravel Vite for CSS -->
    <link rel="stylesheet" href="{{ asset('/styles.css') }}"> <!-- Your custom CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #073e77;
        display: flex;
      }
      .sidebar {
        width: 250px;
        background-color: #073e77;
        color: white;
        padding: 20px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        z-index: 10;
      }
      .content {
          flex: 1;
          padding: 20px;
          background-color: #f9f9f9;
          margin-left: 250px;
          transition: margin-left 0.3s ease;
      }
      .card {
          border: 1px solid #ccc;
          border-radius: 8px;
          padding: 16px;
          margin-top: 16px;
          background-color: #fff; 
      }
      .dashboard-container {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          margin-top: 20px;
      }
      
      /* Hide all content sections by default */
      .content > div {
          display: none;
      }

      /* Show content based on the selected radio button */
      input[type="radio"]:checked + label + div {
          display: block;
      }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <aside class="sidebar">
        <header class="flex items-center mb-4">
            <img src="{{ asset('img/MacatocBMS.png') }}" alt="Logo" class="rounded-full h-20 w-20">
            <p class="ml-8 text-2xl font-bold">ProjectBMS</p>
        </header>

        <ul>
            <main class="container mx-auto p-6">
                @if(Auth::guard('admin')->check())
                    <h2 class="text-2xl font-bold">Welcome, {{ Auth::guard('admin')->user()->name }}</h2>
                @else
                    <h2 class="text-2xl font-bold">Access Denied</h2>
                    <p class="mt-2 text-gray-700">You are not authorized to view this page. Please log in as an admin.</p>
                @endif
            </main>
            <li>
                <label style="display: flex; align-items: center;">
                    <a href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: inherit; width: 100%;">
                        <i class='bx bxs-dashboard'></i>
                        <p>Dashboard</p>
                    </a>
                </label>
            </li>
            <li>
                <label style="display: flex; align-items: center;">
                    <a href="{{ route('admin.barangay_officials') }}" style="text-decoration: none; color: inherit; width: 100%;">
                        <i class='bx bxs-user'></i>
                        <p>Barangay Officials</p>
                    </a>
                </label>
            </li>
            <li>
                <label style="display: flex; align-items: center;">
                    <a href="{{ route('admin.residents.index') }}" style="text-decoration: none; color: inherit; width: 100%;">
                        <i class='bx bxs-folder-plus'></i>
                        <p>Resident Profiling</p>
                    </a>
                </label>
                <a href="{{ route('admin.residents.create') }}">Create Resident</a>
            </li>
            <li>
                <label style="display: flex; align-items: center;">
                    <a href="{{ route('admin.health_sanitation') }}" style="text-decoration: none; color: inherit; width: 100%;">
                        <i class='bx bxs-heart'></i>
                        <p>Health and Sanitation</p>
                    </a>
                </label>
            </li>
            <li>
                <label style="display: flex; align-items: center;">
                    <a href="{{ route('admin.clearances_forms') }}" style="text-decoration: none; color: inherit; width: 100%;">
                        <i class='bx bxs-folder-plus'></i>
                        <p>Clearances and Forms</p>
                    </a>
                </label>
            </li>
            <li>
                <label style="display: flex; align-items: center;">
                    <a href="{{ route('admin.report') }}" style="text-decoration: none; color: inherit; width: 100%;">
                        <i class='bx bxs-cog'></i>
                        <p>Report</p>
                    </a>
                </label>
            </li>
            
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="flex items-center text-white hover:underline">
                    <i class='bx bxs-shield mr-1'></i>
                    Logout
                </button>
            </form>
        </ul>
    </aside>
</body>
</html>
