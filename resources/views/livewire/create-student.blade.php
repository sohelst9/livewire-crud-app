<div class="col-md-12 mt-3">
    <div class="head">
        <h3 class="text-center">Create Student</h3>
    </div>
    <div class="card">
        <div class="card-header">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a wire:navigate class="btn btn-outline-danger" href="{{ url('/') }}">All Student</a>
            
        </div>
        <div class="card-body">
            <form wire:submit.prevent="StoreStudnet">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="St_id" class="form-label">Studnet Id :</label>
                            <input type="text" wire:model="St_id" class="form-control" id="St_id"
                             placeholder="Enter Student Id...">
                            @error('St_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" wire:model="name" class="form-control" id="name"
                             placeholder="Enter Studnet Name...">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="school" class="form-label">School :</label>
                            <input type="text" wire:model="school" class="form-control" id="school"
                             placeholder="Enter Studnet School Name...">
                            @error('school')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone :</label>
                            <input type="text" wire:model="phone" class="form-control" id="phone"
                             placeholder="Enter Studnet Phone Number...">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="class" class="form-label">Class :</label>
                            <select wire:model="class" id="class" class="form-control">
                                <option value="">select class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->name }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            @error('class')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image :</label>
                            <input type="file" wire:model="image" class="form-control" id="image{{ $id }}">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @if ($image)
                            <img height="200px" width="250px" src="{{ $image->temporaryUrl() }}" alt="">
                        @endif
                        <div wire:loading wire:terget="image">
                            <span class="text-success">Uploading...</span>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <button type="button" class="btn btn-outline-danger" wire:click="ResetData" data-bs-dismiss="modal">Clear</button>
                    <button type="submit" class="btn btn-outline-success">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</div>