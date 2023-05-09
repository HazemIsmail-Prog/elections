<?php

namespace App\Http\Livewire;

use App\Models\School;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolIndex extends Component
{
    use WithPagination;

    protected $listeners = ['SchoolsDataChanged' => '$refresh'];

    public $search;
    public $pagination = 9;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($school)
    {
        School::find($school['id'])->delete();
        $max = DB::table('Schools')->max('id') + 1;
        DB::statement("ALTER TABLE Schools AUTO_INCREMENT =  $max");
        $this->emit('SchoolsDataChanged');
    }
    public function render()
    {
        return view('livewire.school-index', [
            'schools' => School::when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
                ->orderBy('name')
                ->paginate($this->pagination),
        ]);
    }
}
