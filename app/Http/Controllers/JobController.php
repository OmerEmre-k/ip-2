<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application; // Application modelini dahil ettik
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::all();
        return view('home', compact('jobs'));
    }


    public function apply($id)
    {
        $job = Job::find($id);
        if (!$job) {
            abort(404, 'İş ilanı bulunamadı.');
        }
        return view('apply', compact('job'));
    }


    public function storeApplication(Request $request, $jobId)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'education' => 'required|string',
            'resume' => 'required|string',
            'notes' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'education_field_id' => 'required|exists:education_fields,id',
            'education_level_id' => 'required|exists:education_levels,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);


        $job = Job::find($jobId);
        if (!$job) {
            return redirect()->route('home')->with('error', 'Bu iş ilanı bulunamadı.');
        }


        $cvPath = $request->file('cv')->storeAs(
            'public/cvs',
            uniqid('cv_', true) . '.' . $request->file('cv')->getClientOriginalExtension()
        );

        $application = Application::create([
            'job_id' => $jobId,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'education' => $validated['education'],
            'resume' => $validated['resume'],
            'notes' => $validated['notes'],
            'cv_path' => $cvPath,
            'education_field_id' => $validated['education_field_id'],
            'education_level_id' => $validated['education_level_id'],
            'skills' => $validated['skills']
        ]);

        if ($validated['skills']) {
            $application->skills()->attach($validated['skills']);
        }

        return redirect()->route('home')->with('success', 'Başvurunuz başarıyla gönderildi!');
    }
}
