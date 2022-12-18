<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;

class Category extends Component
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
        $categories     = \App\Models\admin\Category::all();
        return view('livewire.admin.category.category', [
            'categories'    => $categories,
        ]);
    }
    public $categoryId,$name,$display_name,$status;
    public function resetinputs()
    {
        $this->name = '';
        $this->display_name = '';
        $this->status = '';
    }
    public function store()
    {
        $category   = \App\Models\admin\Category::updateOrCreate(['id'  => $this->categoryId],[
            'name'      => $this->name,
            'display_name'      => $this->display_name,
            'status'      => $this->status,
        ]);
        $this->resetinputs();
        $this->closeform();
        session()->flash('message', 'Category Created Successfully.');
    }
    public function del($id)
    {
        $cateory    = \App\Models\admin\Category::findOrFail($id);
        $cateory->delete();
        session()->flash('message', 'Category deleted Successfully.');
    }
    public function edit($id)
    {
        $category   = \App\Models\admin\Category::findOrFail($id);
        $this->categoryId   = $category->id;
        $this->name         = $category->name;
        $this->display_name         = $category->display_name;
        $this->status         = $category->status;
        $this->openform();
    }
    public function changeStatus ($id)
    {
        $status = \App\Models\admin\Category::findOrFail($id);
        if ($status->status == 1)
        {
            $status->status = 0;
            $status->save();
        } elseif ($status->status == 0)
        {
            $status->status = 1;
            $status->save();
        }
        session()->flash('message', 'Category status changed Successfully.');
    }
}
