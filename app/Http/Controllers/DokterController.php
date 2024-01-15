<?php

namespace App\Http\Controllers;
use App\Models\Dokter;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function showDoctor()
    {   
        $doctors = Dokter::all();
        return view('admin/add_doctor', compact('doctors'));

    }
    public function addDoctor(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'doctorName' => 'required|string',
            'doctorSpecialization' => 'required|string',
            'doctorStatus' => 'required|in:active,inactive',
            'no_telp' => 'required|string',
            'imageInput' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('imageInput')) {
            $image = $request->file('imageInput');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('doctor_images', $imageName, 'public');
        }

        // Create a new Doctor instance
        $doctor = new Dokter();
        $doctor->name = $validatedData['doctorName'];
        $doctor->spesialis = $validatedData['doctorSpecialization'];
        $doctor->status = $validatedData['doctorStatus'];
        $doctor->no_telp = $validatedData['no_telp'];
        $doctor->foto= $imagePath;
        $doctor->save();

        return redirect()->to('admin/add_doctor_dokter')->with('success', 'Dokter berhasil ditambahkan');
    }
    
}
