<?php

namespace App\Http\Livewire;

use App\Models\Provider;
use App\Models\Voter;
use Livewire\Component;

class DashboardIndex extends Component
{

    public $providers = [];
    public $voters = [];

    public function refresh()
    {
        $voters = Voter::all();
        $this->voters = [
            'total' => $voters->count(),
            'voted' => $voters->where('vote_status', true)->count(),
            'nonvoted' => $voters->where('vote_status', false)->count(),
        ];
        $this->providers = Provider::query()
            ->withCount('voters')
            ->withCount(['voters as voted_voters_count' => function ($q) {
                $q->where('vote_status', true);
            }])
            ->withCount(['voters as nonvoted_voters_count' => function ($q) {
                $q->where('vote_status', false);
            }])
            ->get();
    }

    public function mount()
    {
        $this->refresh();
    }
    public function render()
    {
        return view('livewire.dashboard-index');
    }
}
