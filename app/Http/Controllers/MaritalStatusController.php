<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use Illuminate\Http\Request;

class MaritalStatusController extends Controller
{
    public function index()
    {
        $maritalStatuses = MaritalStatus::all();

        return view('marital_statuses.index', compact('maritalStatuses'));
    }

    public function create()
    {
        return view('marital_statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:50',
        ]);

        MaritalStatus::create([
            'status' => $request->status,
        ]);


        return redirect()->route('maritalStatuses.index')->with('success', 'Medeni durum başarıyla eklendi.');
    }

    public function edit($id)
    {

        $maritalStatus = MaritalStatus::findOrFail($id);

        return view('marital_statuses.edit', compact('maritalStatus'));
    }

    public function update(Request $request, $id)
    {
        $maritalStatus = MaritalStatus::findOrFail($id);

        $request->validate([
            'status' => 'required|string|max:50',
        ]);
        $maritalStatus->update([
            'status' => $request->status,
        ]);


        return redirect()->route('maritalStatuses.index')->with('success', 'Medeni durum başarıyla güncellendi.');
    }


    public function destroy($id)
    {
        $maritalStatus = MaritalStatus::findOrFail($id);
        $maritalStatus->delete();

        return redirect()->route('maritalStatuses.index')->with('success', 'Medeni durum başarıyla silindi.');
    }
}
