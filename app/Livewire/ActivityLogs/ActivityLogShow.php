<?php

namespace App\Livewire\ActivityLogs;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class ActivityLogShow extends Component
{
    public $activity;

    public function mount($id)
    {
        $this->activity = Activity::findOrFail($id);
    }

    public function render()
    {
        $filteredProperties = collect($this->activity->properties)->except(['id', 'slug', 'updated_at']);
        return view('livewire.activity-logs.activity-log-show', compact('filteredProperties'))->layout('pages.layout', ['title' => __('keywords.activity_logs')]);
    }
}
