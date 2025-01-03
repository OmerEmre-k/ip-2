<?php

namespace App\Http\Controllers;

use App\Models\DrivingLicense;
use Illuminate\Http\Request;

class DrivingLicenseController extends Controller
{
    // Index method (Tüm ehliyetleri listele)
    public function index()
    {
        // Tüm driving_license kayıtlarını çekiyoruz
        $drivingLicenses = DrivingLicense::all();

        // Verileri 'driving_licenses.index' view'ine gönderiyoruz
        return view('driving_licenses.index', compact('drivingLicenses'));
    }

    public function create()
    {

        return view('driving_licenses.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'license_class' => 'required|string|max:10',
            'level' => 'required|string|max:20',
        ]);

        DrivingLicense::create([
            'license_class' => $request->license_class,
            'level' => $request->level,
        ]);


        return redirect()->route('drivingLicenses.index')->with('success', 'Ehliyet başarıyla eklendi.');
    }


    public function edit($id)
    {

        $drivingLicense = DrivingLicense::findOrFail($id);


        return view('driving_licenses.edit', compact('drivingLicense'));
    }


    public function update(Request $request, $id)
    {

        $drivingLicense = DrivingLicense::findOrFail($id);


        $request->validate([
            'license_class' => 'required|string|max:10',
            'level' => 'required|string|max:20',
        ]);


        $drivingLicense->update([
            'license_class' => $request->license_class,
            'level' => $request->level,
        ]);

        return redirect()->route('drivingLicenses.index')->with('success', 'Ehliyet başarıyla güncellendi.');
    }

    public function destroy($id)
    {

        $drivingLicense = DrivingLicense::findOrFail($id);


        $drivingLicense->delete();

        return redirect()->route('drivingLicenses.index')->with('success', 'Ehliyet başarıyla silindi.');
    }
}
