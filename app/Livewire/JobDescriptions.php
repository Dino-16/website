<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Job;

class JobDescriptions extends Component
{
    public $job;

    public function mount($id)
    {
        $this->job = Job::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.job-descriptions');
    }

}
