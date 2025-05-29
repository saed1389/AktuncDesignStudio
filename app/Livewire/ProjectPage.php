<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Project;
use App\Models\SubCategory;
use Livewire\Component;

class ProjectPage extends Component
{
    public $slug;
    public $category;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->category = Category::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        $subCategories = SubCategory::where('category_id', $this->category->id)->get();
        $projects = Project::where('category_id', $this->category->id)->get();

        return view('livewire.project-page', [
            'projects' => $projects,
            'subCategories' => $subCategories,
            'category' => $this->category,
        ]);
    }
}
