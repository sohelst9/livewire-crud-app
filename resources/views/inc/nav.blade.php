<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a wire:navigate class="navbar-brand logo" href="{{ url('/') }}">Livewire Crud App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a wire:navigate class="nav-link" href="{{ route('about.us') }}">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a wire:navigate class="nav-link" href="{{ route('contact.us') }}">Contact Us</a>
                  </li>
            </ul>
            <div class="list_btn">
                <a wire:navigate class="btn btn-success" href="{{ url('/') }}">Students</a>
            </div>
        </div>
    </div>
</nav>