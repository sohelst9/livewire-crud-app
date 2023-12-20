<?php

namespace App\Livewire;

use App\Models\Student as ModelsStudent;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;
    public $search;
    public function deleteStudent($id)
    {
        $oldStudent = ModelsStudent::findOrFail($id);
        if($oldStudent->image){
            Storage::delete($oldStudent->image);
        }
        $oldStudent->delete();
        session()->flash('success', 'Studnet Deleted Successfully!');
    }
    public function render()
    {
        $students = ModelsStudent::latest()
            ->where('st_id', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->paginate(5)
            ->withQueryString();
        return view('livewire.student', [
            'students' => $students,
        ]);
    }
}
