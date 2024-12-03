@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Resident</h1>
    <form action="{{ route('admin.residents.update', $resident->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $resident->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" class="form-control" id="middle_name" value="{{ $resident->middle_name }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $resident->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" class="form-control" id="birthdate" value="{{ $resident->birthdate }}" required>
        </div>

        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control" id="place_of_birth" value="{{ $resident->place_of_birth }}" required>
        </div>

        <div class="form-group">
            <label for="age">Age </label>
            <input type="number" name="age" class="form-control" id="age" value="{{ $resident->age }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" id="gender" required>
                <option value="male" {{ $resident->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $resident->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $resident->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="civil_status">Civil Status</label>
            <select name="civil_status" class="form-control" id="civil_status" required>
                <option value="single" {{ $resident->civil_status == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ $resident->civil_status == 'married' ? 'selected' : '' }}>Married</option>
                <option value="widowed" {{ $resident->civil_status == 'widowed' ? 'selected' : '' }}>Widowed</option>
                <option value="divorced" {{ $resident->civil_status == 'divorced' ? 'selected' : '' }}>Divorced</option>
            </select>
        </div>

        <div class="form-group">
            <label for="purok">Purok</label>
            <input type="text" name="purok" class="form-control" id="purok" value="{{ $resident->purok }}" required>
        </div>

        <div class="form-group">
            <label for="four_ps_beneficiary">4Ps Beneficiary</label>
            <input type="checkbox" name="four_ps_beneficiary" id="four_ps_beneficiary" value="1" {{ $resident->four_ps_beneficiary ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" class="form-control" id="nationality" value="{{ $resident->nationality }}" required>
        </div>

        <div class="form-group">
            <label for="national_id">National ID</label>
            <input type="text" name="national_id" class="form-control" id="national_id" value="{{ $resident->national_id }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ $resident->address }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $resident->email }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image Upload</label>
            <input type="file" name="image" class="form-control" id="image">
            @if($resident->image)
                <img src="{{ asset('storage/' . $resident->image) }}" alt="Resident Image" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Resident</button>
    </form>
</div>
@endsection