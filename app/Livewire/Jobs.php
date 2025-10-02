<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Job;

class Jobs extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    public function render()
    {
        $jobs = Job::where('status', 'Posted')
            ->where(function ($query) {
                $query->where('job_title', 'like', '%' . $this->search . '%')
                    ->orWhere('requisition_id', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(9);

        return view('livewire.jobs', compact('jobs')); 
    }

}
