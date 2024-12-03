@extends('layouts.app')

@section('content')
<div class="content">
    @include('layouts.sidebar', [
        'links' => [
            ['name' => 'My Profile', 'route' => route('user.profile'), 'icon' => 'bx bx-user-circle'],
            ['name' => 'Barangay Officials', 'route' => route('user.barangay_officials'), 'icon' => 'bx bx-user'],
            ['name' => 'Health & Sanitation', 'route' => route('user.health_sanitation'), 'icon' => 'bx bx-heart'],
            ['name' => 'Clearances & Forms', 'route' => route('user.clearances_forms'), 'icon' => 'bx bx-folder'],
            ['name' => 'Community Reports', 'route' => route('user.community_reports'), 'icon' => 'bx bx-file'],
            ['name' => 'Notifications', 'route' => route('user.notifications'), 'icon' => 'bx bx-bell'],
        ]
    ])
</div>
@endsection
