<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    // Sertifikaları listeleme
    public function index()
    {
        $certifications = Certification::all();
        return view('certifications.index', compact('certifications'));
    }

    // Yeni sertifika ekleme formu
    public function create()
    {
        return view('certifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Certification::create($validated);

        return redirect()->route('certifications.index')->with('success', 'Sertifika başarıyla eklendi!');
    }

    public function edit($id)
    {
        $certification = Certification::findOrFail($id); // findOrFail ile daha güvenli
        return view('certifications.edit', compact('certification'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $certification = Certification::findOrFail($id); // findOrFail ile daha güvenli
        $certification->update($validated);

        return redirect()->route('certifications.index')->with('success', 'Sertifika başarıyla güncellendi!');
    }

    public function destroy($id)
    {
        $certification = Certification::findOrFail($id); // findOrFail ile daha güvenli
        $certification->delete();

        return redirect()->route('certifications.index')->with('success', 'Sertifika başarıyla silindi!');
    }
}
