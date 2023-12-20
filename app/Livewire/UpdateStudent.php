<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UpdateStudent extends Component
{
    use WithFileUploads;
    public $id;
    public $student;
    public $image;
    public $file_id = 1;
    public $St_id, $name, $school, $phone, $class, $old_image;

    public function mount()
    {
        $this->student = Student::find($this->id);
        $this->St_id = $this->student->st_id;
        $this->name = $this->student->name;
        $this->school = $this->student->school;
        $this->phone = $this->student->phone;
        $this->class = $this->student->class;
        $this->old_image = $this->student->image;
    }
    //--update student data--
    public function UpdateStudnet()
    {
        $this->validate([
            'St_id' => 'required',
            'name' => 'required',
            'school' => 'required',
            'class' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $oldStudent = Student::findOrFail($this->id);
        $oldStudent->update([
            'st_id' => $this->St_id,
            'name' => $this->name,
            'school' => $this->school,
            'phone' => $this->phone,
            'class' => $this->class,
        ]);
        if($this->image){
            if($oldStudent->image){
                Storage::delete($oldStudent->image);
            }
            $imageName = time() .'-update'. '.' . $this->image->extension();
            $path_name = $this->image->storeAs('public/student', $imageName);
            $oldStudent->update([
                'image' => $path_name
            ]);
        }
        session()->flash('success', 'Studnet Updated Successfully!');
        $this->resetData();
        return redirect()->to('/'); 
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
        $this->file_id++;
    }
    public function render()
    {
        return view('livewire.update-student', [
            'classes' => StudentClass::get(),
        ]);
    }
}
