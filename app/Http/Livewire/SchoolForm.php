<?php

namespace App\Http\Livewire;

use App\Models\School;
use Livewire\Component;

class SchoolForm extends Component
{

    public $school;
    public $modalTitle;
    public $showModal = false;

    protected $listeners = [
        'showModal' => 'showModal',
    ];

    public function rules()
    {
        if (isset($this->school['id'])) {
            return [
                'school.name' => ['required'],
            ];
        } else {
            return [
                'school.name' => ['required'],
            ];
        }
    }

    public function showModal($school)
    {
        $this->reset();
        $this->resetValidation();
        if ($school) {
            $this->modalTitle =  __('messages.edit_school');
            $this->school = $school;
        } else {
            $this->modalTitle =  __('messages.add_school');
        }
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();
        if (isset($this->school['id'])) {
            $school = School::find($this->school['id']);
            $school->update($this->school);
            $this->showModal = false;
            $this->emit('SchoolsDataChanged');
        } else {
            $school = School::create($this->school);
            $this->showModal = false;
            $this->emit('SchoolsDataChanged');
        }
    }
    public function render()
    {
        return view('livewire.school-form');
    }
}
