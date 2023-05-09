<?php

namespace App\Http\Livewire;

use App\Models\Voter;
use Livewire\Component;

class VoterForm extends Component
{

    public $voter;
    public $modalTitle;
    public $showModal = false;

    protected $listeners = [
        'showModal' => 'showModal',
    ];

    public function rules()
    {
        if (isset($this->voter['id'])) {
            return [
                'voter.name' => ['required'],
            ];
        } else {
            return [
                'voter.name' => ['required'],
            ];
        }
    }

    public function showModal($voter)
    {
        $this->reset();
        $this->resetValidation();
        if ($voter) {
            $this->modalTitle =  __('messages.edit_voter');
            $this->voter = $voter;
        } else {
            $this->modalTitle =  __('messages.add_voter');
        }
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();
        if (isset($this->voter['id'])) {
            $voter = Voter::find($this->voter['id']);
            $voter->update($this->voter);
            $this->showModal = false;
            $this->emit('VotersDataChanged');
        } else {
            $voter = Voter::create($this->voter);
            $this->showModal = false;
            $this->emit('VotersDataChanged');
        }
    }
    public function render()
    {
        return view('livewire.voter-form');
    }
}
