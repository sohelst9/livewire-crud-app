<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\StudentClass;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateStudent extends Component
{
    use WithFileUploads;
    public $id = 1;
    public $St_id, $name, $school, $phone, $class, $image;

    public function StoreStudnet()
    {
        $this->validate([
            'St_id' => 'required',
            'name' => 'required',
            'school' => 'required',
            'class' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imageName = time() . '.' . $this->image->extension();
        $path_name = $this->image->storeAs('public/student', $imageName);
        $student = new Student();
        $student->st_id = $this->St_id;
        $student->name = $this->name;
        $student->school = $this->school;
        $student->phone = $this->phone;
        $student->class = $this->class;
        $student->image = $path_name;
        $student->save();

        session()->flash('success', 'Studnet Added Successfully !');
        $this->resetData();
    }
    
    //reset data----
    public function ResetData()
    {
        $this->St_id = '';
        $this->name = '';
        $this->school = '';
        $this->phone = '';
        $this->class = '';
        $this->image = null;
        $this->id++;
    }
    public function render()
    {
        return view('livewire.create-student', [
            'classes' => StudentClass::get(),
        ]);
    }
}
