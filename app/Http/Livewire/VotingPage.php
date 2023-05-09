<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Voter;
use Livewire\Component;
use Livewire\WithPagination;

class VotingPage extends Component
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

    public function mount()
    {
        $this->sections = auth()->user()->sections->load('school');
        if($this->sections->count() == 1){
            $this->selected_section = $this->sections->first()->id;
        }else{
            $this->selected_section = "";
        }
    }

    public function render()
    {
        return view('livewire.voting-page', [
            'voters' => Voter::query()
                ->whereIn('section_id', auth()->user()->sections->pluck('id'))
                ->where('section_id', $this->selected_section)
                ->when($this->search, function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orderBy('name')
                ->paginate(10)
        ]);
    }
}
