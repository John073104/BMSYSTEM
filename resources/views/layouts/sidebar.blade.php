<aside class="sidebar">
    <header class="flex items-center mb-4">
        <img src="{{ asset('img/MacatocBMS.png') }}" alt="Logo" class="rounded-full h-20 w-20">
        <p class="ml-8 text-2xl font-bold">ProjectBMS</p>
    </header>
    <ul>
        @foreach($links as $link)
            <li>
                <label style="display: flex; align-items: center;">
                    <a href="{{ $link['route'] }}" style="text-decoration: none; color: inherit; width: 100%;">
                        <i class="{{ $link['icon'] }}"></i>
                        <p>{{ $link['name'] }}</p>
                    </a>
                </label>
            </li>
        @endforeach
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="flex items-center text-white hover:underline">
                <i class='bx bxs-shield mr-1'></i>
                Logout
            </button>
        </form>
    </ul>
</aside>
