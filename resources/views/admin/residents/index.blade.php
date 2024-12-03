@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Residents List</h1>
    <a href="{{ route('admin.residents.create') }}">Create Resident</a>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Birthdate</th>
                <th>Place of Birth</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>Purok</th>
                <th>4Ps Beneficiary</th>
                <th>Nationality</th>
                <th>National ID</th>
                <th>Address</th>
                <th>Email</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($residents as $resident)
            <tr>
                <td>{{ $resident->first_name }}</td>
                <td>{{ $resident->middle_name }}</td>
                <td>{{ $resident->last_name }}</td>
                <td>{{ $resident->birthdate }}</td>
                <td>{{ $resident->place_of_birth }}</td>
                <td>{{ $resident->age }}</td>
                <td>{{ $resident->gender }}</td>
                <td>{{ $resident->civil_status }}</td>
                <td>{{ $resident->purok }}</td>
                <td>{{ $resident->four_ps_beneficiary ? 'Yes' : 'No' }}</td>
                <td>{{ $resident->nationality }}</td>
                <td>{{ $resident->national_id }}</td>
                <td>{{ $resident->address }}</td>
                <td>{{ $resident->email }}</td>
                <td>
                    @if($resident->image)
                        <img src="{{ asset('storage/' . $resident->image) }}" alt="Resident Image" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('residents.edit', $resident->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection