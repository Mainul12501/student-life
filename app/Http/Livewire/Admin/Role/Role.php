<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;

class Role extends Component
{
    public $openForm    = false;
    public $openTable    = true;

    public function openform ()
    {
        $this->openForm = true;
        $this->openTable = false;
    }
    public function closeform()
    {
        $this->openForm = false;
        $this->openTable = true;
    }
    public function render()
    {
        $roles  = \App\Models\admin\Role::all();
        return view('livewire.admin.role.role', [
            'roles'     => $roles,
        ]);
    }
    public $name, $display_name;
    protected $rules    = [
        'name'  => 'required',
        'display_name'  => 'required',
    ];
    public function resetinputs()
    {
        $this->name = '';
        $this->display_name = '';
    }
    public function store()
    {
        $this->validate();
        \App\Models\admin\Role::create([
            'name'  => $this->name,
            'display_name'  => $this->display_name,
        ]);
        $this->resetinputs();
        $this->closeform();
        session()->flash('message', 'Role Created Successfully.');
    }
    public function del($id)
    {
        $role   = \App\Models\admin\Role::findOrFail($id);
        $role->delete();
        session()->flash('message', 'Role Deleted Successfully.');
    }


//    public function opps()
//    {
//        if ($this->openForm == false)
//        {
//            $this->openForm = true;
//            $this->openTable = false;
//        } elseif ($this->openTable  == false)
//        {
//            $this->openForm = false;
//            $this->openTable = true;
//        }
//    }
}
