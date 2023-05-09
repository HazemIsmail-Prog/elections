<?php

namespace App\Http\Livewire;

use App\Models\Provider;
use Livewire\Component;

class ProviderForm extends Component
{

    public $provider;
    public $modalTitle;
    public $showModal = false;

    protected $listeners = [
        'showModal' => 'showModal',
    ];

    public function rules()
    {
        if (isset($this->provider['id'])) {
            return [
                'provider.name' => ['required'],
            ];
        } else {
            return [
                'provider.name' => ['required'],
            ];
        }
    }

    public function showModal($provider)
    {
        $this->reset();
        $this->resetValidation();
        if ($provider) {
            $this->modalTitle =  __('messages.edit_provider');
            $this->provider = $provider;
        } else {
            $this->modalTitle =  __('messages.add_provider');
        }
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();
        if (isset($this->provider['id'])) {
            $provider = Provider::find($this->provider['id']);
            $provider->update($this->provider);
            $this->showModal = false;
            $this->emit('ProvidersDataChanged');
        } else {
            $provider = Provider::create($this->provider);
            $this->showModal = false;
            $this->emit('ProvidersDataChanged');
        }
    }
    public function render()
    {
        return view('livewire.provider-form');
    }
}
