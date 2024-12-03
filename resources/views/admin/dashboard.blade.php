@extends('layouts.app')

@section('content')
<div class="content">
    @include('layouts.sidebar', [
        'links' => [
            ['name' => 'Dashboard', 'route' => route('admin.dashboard'), 'icon' => 'bx bxs-dashboard'],
            ['name' => 'Barangay Officials', 'route' => route('admin.barangay_officials'), 'icon' => 'bx bxs-user'],
            ['name' => 'Resident Profiling', 'route' => route('admin.residents.index'), 'icon' => 'bx bxs-folder-plus'],
            ['name' => 'Health & Sanitation', 'route' => route('admin.health_sanitation'), 'icon' => 'bx bxs-heart'],
            ['name' => 'Clearances & Forms', 'route' => route('admin.clearances_forms'), 'icon' => 'bx bxs-folder-plus'],
            ['name' => 'Reports', 'route' => route('admin.report'), 'icon' => 'bx bxs-cog'],
        ]
    ])
</div>
@endsection
