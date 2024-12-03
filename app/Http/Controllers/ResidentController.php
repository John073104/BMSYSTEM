<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('admin.residents.index', compact('residents'));
    }

    public function create()
    {
        return view('admin.residents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'place_of_birth' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'civil_status' => 'required|string',
            'purok' => 'required|string',
            'four_ps_beneficiary' => 'nullable|boolean',
            'nationality' => 'required|string',
            'national_id' => 'required|unique:residents',
            'address' => 'required|string',
            'email' => 'required|email|unique:residents',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Resident::create($data);
        return redirect()->route('residents.index')->with('success', 'Resident added successfully.');
    }

    public function edit($id)
    {
        $resident = Resident::findOrFail($id);
        return view('admin.residents.edit', compact('resident'));
    }

    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);
        
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'place_of_birth' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'civil_status' => 'required|string',
            'purok' => 'required|string',
            'four_ps_beneficiary' => 'nullable|boolean',
            'nationality' => 'required|string',
            'national_id' => 'required|unique:residents,national_id,' . $resident->id,
            'address' => 'required|string',
            'email' => 'required|email|unique:residents,email,' . $resident->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($resident->image) {
                Storage::disk('public')->delete($resident->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $resident->update($data);
        return redirect()->route('residents.index')->with('success', 'Resident updated successfully.');
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        if ($resident->image) {
            Storage::disk('public')->delete($resident->image);
        }
        $resident->delete();
        return redirect()->route('residents.index')->with('success', 'Resident deleted successfully.');
    }
}