<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\admin\Category;
use Livewire\Component;

class SubCategory extends Component
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
        $categories = Category::where('status', 1)->select('*')->get()->except('display_name');
        $subCategories  = \App\Models\admin\SubCategory::all();
        return view('livewire.admin.subcategory.sub-category', [
            'categories'    => $categories,
            'subCategories' => $subCategories,
        ]);
    }
    public $subCategoryId,$name,$category_id,$status;
    public function resetinputs()
    {
        $this->name = '';
        $this->category_id = '';
        $this->status = '';
    }
    public function store()
    {
        $category   = \App\Models\admin\SubCategory::updateOrCreate(['id'  => $this->subCategoryId],[
            'name'      => $this->name,
            'category_id'      => $this->category_id,
            'status'      => $this->status,
        ]);
        $this->resetinputs();
        $this->closeform();
        session()->flash('message', 'Category Created Successfully.');
    }
    public function del($id)
    {
        $cateory    = \App\Models\admin\SubCategory::findOrFail($id);
        $cateory->delete();
        session()->flash('message', 'Sub - Category deleted Successfully.');
    }
    public function edit($id)
    {
        $subcategory   = \App\Models\admin\SubCategory::findOrFail($id);
        $this->subCategoryId   = $subcategory->id;
        $this->name         = $subcategory->name;
        $this->category_id         = $subcategory->category_id;
        $this->status         = $subcategory->status;
        $this->openform();
    }
    public function changeStatus ($id)
    {
        $status = \App\Models\admin\SubCategory::findOrFail($id);
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
