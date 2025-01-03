<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\EducationField;
use App\Models\EducationLevel;
use App\Models\Skill;
use App\Models\Language;
use App\Models\MilitaryService;
use App\Models\DrivingLicense;
use App\Models\MaritalStatus;
use App\Models\Location;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index($id)
    {
        $job = Job::find($id);
        $locations = Location::all();
        $educationFields = EducationField::all();
        $educationLevels = EducationLevel::all();
        $skills = Skill::all();
        $languages = Language::all();
        $militaryStatuses = MilitaryService::all();
        $drivingLicenses = DrivingLicense::all();
        $maritalStatuses = MaritalStatus::all();

        return view('apply', compact('job', 'educationFields', 'educationLevels', 'skills', 'languages', 'militaryStatuses', 'drivingLicenses', 'maritalStatuses','locations'));
    }

    public function store(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15|regex:/^[0-9]{10,15}$/',
            'education' => 'required|string',
            'resume' => 'required|string',
            'notes' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'education_field_id' => 'required|exists:education_fields,id',
            'education_level_id' => 'required|exists:education_levels,id',
            'skill_id' => 'required|exists:skills,id',
            'location_id' => 'required|exists:locations,id',  // Bu satırın doğru olduğundan emin olun
            'language_id' => 'nullable|exists:languages,id',
            'military_status_id' => 'required|exists:military_services,id',
            'driving_license_id' => 'nullable|exists:driving_licenses,id',
            'marital_status_id' => 'required|exists:marital_statuses,id',
        ]);

        $job = Job::find($id);
        if (!$job) {
            return redirect()->route('home')->with('error', 'Bu iş ilanı bulunamadı.');
        }

        try {

            $cvPath = $request->file('cv')->storeAs(
                'public/cvs',
                uniqid('cv_', true) . '.' . $request->file('cv')->getClientOriginalExtension() // Benzersiz bir isim oluşturuluyor
            );

            $application = Application::create([
                'job_id' => $id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'education' => $validated['education'],
                'resume' => $validated['resume'],
                'notes' => $validated['notes'] ?? null,
                'cv_path' => $cvPath,
                'education_field_id' => $validated['education_field_id'],
                'education_level_id' => $validated['education_level_id'],
                'skill_id' => $validated['skill_id'],
                'location_id' => $validated['location_id'],  // Burada 'location_id' kullanıyoruz
                'military_status_id' => $validated['military_status_id'],
                'driving_license_id' => $validated['driving_license_id'] ?? null,
                'marital_status_id' => $validated['marital_status_id'],
                'language_id' => $validated['language_id'] ?? null, // Eğer dil seçilmediyse null olacak
            ]);

            return redirect()->route('home')->with('success', 'Başvurunuz başarıyla gönderildi!');
        } catch (\Exception $e) {

            \Log::error('Başvuru kaydedilirken hata oluştu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Başvuru kaydedilirken bir hata oluştu.');
        }
    }
}
