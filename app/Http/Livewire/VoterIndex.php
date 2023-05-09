<?php

namespace App\Http\Livewire;

use App\Models\Voter;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class VoterIndex extends Component
{
    use WithPagination;

    protected $listeners = ['VotersDataChanged' => '$refresh'];

    public $search;
    public $pagination = 9;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($voter)
    {
        Voter::find($voter['id'])->delete();
        $max = DB::table('Voters')->max('id') + 1;
        DB::statement("ALTER TABLE Voters AUTO_INCREMENT =  $max");
        $this->emit('VotersDataChanged');
    }
    public function render()
    {
        return view('livewire.voter-index', [
            'voters' => Voter::when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->with('provider')
            ->with('section.school')
            ->orderBy('name')
            ->paginate($this->pagination),
        ]);
    }
}
