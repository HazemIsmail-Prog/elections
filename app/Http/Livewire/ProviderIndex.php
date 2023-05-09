<?php

namespace App\Http\Livewire;

use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProviderIndex extends Component
{
    use WithPagination;

    protected $listeners = ['ProvidersDataChanged' => '$refresh'];

    public $search;
    public $pagination = 9;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($provider)
    {
        Provider::find($provider['id'])->delete();
        $max = DB::table('Providers')->max('id') + 1;
        DB::statement("ALTER TABLE Providers AUTO_INCREMENT =  $max");
        $this->emit('ProvidersDataChanged');
    }
    public function render()
    {
        return view('livewire.provider-index', [
            'providers' => Provider::when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
                ->orderBy('name')
                ->paginate($this->pagination),
        ]);
    }
}
