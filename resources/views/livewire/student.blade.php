<div class="col-md-12 mt-3">
    <div class="head">
        <h3 class="text-center">All Student List</h3>
    </div>
    <div class="card">
        @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        <div class="card-header d-flex justify-content-between align-items-center">
            <a wire:navigate class="btn btn-outline-danger" href="{{ route('student.create') }}">Add New Student
                +</a>
            <form class="d-flex" action="" method="GET">
                <input type="text" wire:model.live.debounce.500ms="search" class="form-control me-2" placeholder="search name or id..">
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">School</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Class</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key=>$student)
                            <tr class="text-center">
                                <th scope="row">{{ $key+1 }}</th>
                                <th>{{ $student->st_id }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->school }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->class }}</td>
                                <td>
                                    @if ($student->image)
                                        <img width="80" height="60" src="{{ Storage::url($student->image) }}" alt="">
                                    @endif
                                </td>
                                <td>
                                    <a wire:navigate href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                                    <a href="#" wire:click="deleteStudent({{ $student->id }})" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
