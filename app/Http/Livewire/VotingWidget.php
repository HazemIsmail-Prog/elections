<?php

namespace App\Http\Livewire;

use App\Models\Voter;
use Livewire\Component;
use Livewire\WithPagination;

class VotingWidget extends Component
{
    use WithPagination;

    public $search;
    public $sections;
    public $selected_section;

    public function vote($voter)
    {
        Voter::find($voter['id'])->update([
            'vote_status' => 1,
            'vote_date_time' => now(),
        ]);
    }
    public function unvote($voter)
    {
        Voter::find($voter['id'])->update([
            'vote_status' => 0,
            'vote_date_time' => null,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedSelectedSection()
    {
        $this->resetPage();
        $this->reset('search');
    }

    public function mount()
    {
        $this->sections = auth()->user()->sections->load('school');
        if ($this->sections->count() == 1) {
            $this->selected_section = $this->sections->first()->id;
        } else {
            $this->selected_section = "";
        }
    }

    public function render()
    {
        return view('livewire.voting-widget', [
            'voters' => Voter::query()
                ->where('vote_status', 1)
                ->when($this->search, function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orderBy('vote_date_time','desc')
                ->paginate(10)
        ]);
    }
}
