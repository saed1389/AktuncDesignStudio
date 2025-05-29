<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectDetailPage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $project = Project::where('slug', $this->slug)->firstOrFail();
        return view('livewire.project-detail-page', [
            'project' => $project,
        ]);
    }
}
