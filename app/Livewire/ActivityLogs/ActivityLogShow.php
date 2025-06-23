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
        return view('livewire.activity-logs.activity-log-show')->layout('pages.layout', ['title' => __('keywords.activity_logs')]);
    }
}
