<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/akar-icons-fonts"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }
        .sidebar header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .sidebar header img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
        }
        .sidebar ul li:hover {
            background: #34495e;
        }
        .sidebar ul li input {
            display: none;
        }
        .sidebar ul li label {
            display: flex;
            align-items: center; color: white;
        }
        .sidebar ul li label i {
            margin-right: 10px;
        }
        main {
            margin-left: 270px; /* Space for the sidebar */
            padding: 20px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

<aside class="sidebar">
    <header>
        <img src="/img/MacatocBMS.png" alt="Logo" />
        <p class="text-2xl font-bold">ProjectBMS</p>
    </header>
    <ul>
    <main class="container mx-auto p-6">
    @if(auth()->check())
        <h2 class="text-1xl font-bold">Welcome, {{ auth()->user()->name }}</h2>
    @else
        <h2 class="text-2xl font-bold">Welcome, Guest</h2>
    @endif
</main>
        <li>
            <input type="radio" id="my-profile" name="sidebar" onclick="loadModule('my-profile')" />
            <label for="my-profile">
                <i class="bx bx-user-circle"></i>
                <p>My Profile</p>
            </label>
        </li>
        <li>
            <input type="radio" id="barangay-officials" name="sidebar" onclick="loadModule('barangay-officials')" />
            <label for="barangay-officials">
                <i class="bx bx-user"></i>
                <p>Barangay Officials</p>
            </label>
        </li>
        <li>
            <input type="radio" id="health-sanitation" name="sidebar" onclick="loadModule('health-sanitation')" />
            <label for="health-sanitation">
                <i class="bx bx-heart"></i>
                <p>Health & Sanitation</p>
            </label>
        </li>
        <li>
            <input type="radio" id="clearances-forms" name="sidebar" onclick="loadModule('clearances-forms')" />
            <label for="clearances-forms">
                <i class="bx bx-folder"></i>
                <p>Clearances & Forms</p>
            </label>
        </li>
        <li>
            <input type="radio" id="community-reports" name="sidebar" onclick="loadModule('community-reports')" />
            <label for="community-reports">
                <i class="bx bx-file"></i>
                <p>Community Reports</p>
            </label>
        </li>
        <li>
            <input type="radio" id="notifications" name="sidebar" onclick="loadModule('notifications')" />
            <label for="notifications">
                <i class="bx bx-bell"></i>
                <p>Notifications</p>
            </label>
        </li>
        <li>
         <input type="radio" id="logout" name="sidebar" />
         <label for="logout">
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="flex items-center text-white hover:underline">
                <i class='bx bxs-shield mr-1'></i> 
                Logout
            </button>
        </form>
    </label>
</li>
    </ul>
</aside>

<div id="module-content" class="container mx-auto p-6">
    <!-- Dynamic content will be loaded here -->
</div>

<script>
    function loadModule(module) {
        const contentDiv = document.getElementById('module-content');
        switch(module) {
            case 'my-profile':
                contentDiv.innerHTML = '<h3>My Profile Module</h3><p>Content for My Profile.</p>';
                break;
            case 'barangay-officials':
                contentDiv.innerHTML = '<h3>Barangay Officials Module</h3><p>Content for Barangay Officials.</p>';
                break;
            case 'health-sanitation':
                contentDiv.innerHTML = '<h3>Health & Sanitation Module</h3><p>Content for Health & Sanitation.</p>';
                break;
            case 'clearances-forms':
                contentDiv.innerHTML = '<h3>Clearances & Forms Module</h3><p>Content for Clearances & Forms.</p>';
                break;
            case 'community-reports':
                contentDiv.innerHTML = '<h3>Community Reports Module</h3><p>Content for Community Reports.</p>';
                break;
            case 'notifications':
                contentDiv.innerHTML = '<h3>Notifications Module</h3><p>Content for Notifications.</p>';
                break;
        }
    }
</script>
</body>
</html>