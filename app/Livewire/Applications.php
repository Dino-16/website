<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Application;
use App\Models\Job;

class Applications extends Component
{
    use WithFileUploads;

    public $applicantLastName = '';
    public $applicantFirstName = '';
    public $applicantMiddleName = '';
    public $applicantSuffixName = '';
    public $applicantAddress = '';
    public $applicantPhone = '';
    public $applicantEmail = '';
    public $applicantResumeFile;
    public $job;
    public $agreedToTerms = false;

    protected $rules = [
        'applicantLastName'     => 'required|string|max:50',
        'applicantFirstName'    => 'required|string|max:50',
        'applicantMiddleName'   => 'required|string|max:50',
        'applicantSuffixName'   => 'nullable|string|max:10',
        'applicantAddress'      => 'required|string|max:250',
        'applicantPhone'        => 'required|string|max:50',
        'applicantEmail'        => 'required|email|max:100',
        'applicantResumeFile'   => 'required|file|mimes:pdf,doc,docx|max:2048',
        'agreedToTerms' => 'accepted',
    ];

    public function mount($id)
    {
        $this->job = Job::findOrFail($id);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitApplication()
    {
        $this->validate();

        $applicantResumePath = $this->applicantResumeFile->store('', 'resumes');
        $applicantResumeUrl = asset('storage/' . $applicantResumePath);

        Application::create([
            'job_id'                => $this->job->id,
            'job_title'             => $this->job->job_title,
            'applicant_last_name'   => $this->applicantLastName,
            'applicant_first_name'  => $this->applicantFirstName,
            'applicant_middle_name' => $this->applicantMiddleName,
            'applicant_suffix_name' => $this->applicantSuffixName,
            'applicant_address'     => $this->applicantAddress,
            'applicant_phone'       => $this->applicantPhone,
            'applicant_email'       => $this->applicantEmail,
            'applicant_resume_file' => $applicantResumeUrl,
            'status' => 'Not Filtered',
            'agreed_to_terms' => $this->agreedToTerms,
        ]);

        session()->flash('success', 'Application submitted successfully');

        return redirect()->route('application', ['id' => $this->job->id]);
    }

    public function render()
    {
        return view('livewire.applications');
    }
}
