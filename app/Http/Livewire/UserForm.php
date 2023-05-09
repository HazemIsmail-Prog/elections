<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Role;
use App\Models\School;
use Livewire\Component;

class UserForm extends Component
{
    public $user;
    public $modalTitle;
    public $roles = [];
    public $schools = [];
    public $selected_roles = [];
    public $selected_sections = [];
    public $showModal = false;

    protected $listeners = [
        'showModal' => 'showModal',
    ];

    public function rules()
    {
        if (isset($this->user['id'])) {
            return [
                'user.name' => ['required'],
                'user.username' => ['required', 'unique:users,username,' . $this->user['id'] . ''],
                'selected_roles' => ['required'],
            ];
        } else {
            return [
                'user.name' => ['required'],
                'user.username' => ['required', 'unique:users,username'],
                'user.password' => ['required'],
                'selected_roles' => ['required'],
            ];
        }
    }

    public function mount()
    {
        $this->roles = Role::all();
        $this->schools = School::with('sections')->get();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showModal($user)
    {
        $this->reset();
        $this->resetValidation();
        if ($user) {
            $this->modalTitle =  __('تعديل مستخدم');
            $this->user = $user;
            $this->selected_roles = User::find($this->user['id'])->roles->pluck('id');
            $this->selected_sections = User::find($this->user['id'])->sections->pluck('id');
        } else {
            $this->modalTitle =  __('اضافة مستخدم');
        }
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();
        if (isset($this->user['id'])) {
            $user = User::find($this->user['id']);
            $user->update($this->user);
            if (isset($this->user['password'])) {
                $user->password = bcrypt($this->user['password']);
                $user->save();
            }
            $user->roles()->sync($this->selected_roles);
            $user->sections()->sync($this->selected_sections);
            $this->showModal = false;
            $this->emit('UsersDataChanged');
        } else {
            $user = User::create($this->user);
            $user->password = bcrypt($this->user['password']);
            $user->save();
            $user->roles()->sync($this->selected_roles);
            $user->sections()->sync($this->selected_sections);
            $this->showModal = false;
            $this->emit('UsersDataChanged');
        }
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
