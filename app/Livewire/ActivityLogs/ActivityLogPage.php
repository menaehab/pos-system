<?php

namespace App\Livewire\ActivityLogs;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use Livewire\WithPagination;

class ActivityLogPage extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $activityLogs = Activity::where('description', 'like', "%{$this->search}%")
            ->orWhereHas('causer', function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);
        return view('livewire.activity-logs.activity-log-page', compact('activityLogs'))
            ->layout('pages.layout', ['title' => __('keywords.activity_logs')]);
    }
}
