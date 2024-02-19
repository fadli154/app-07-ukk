<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3 text-capitalize">
                                <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->roles }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header text-primary">Pdhlii</h6>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/"><i class="icon-mid bi bi-house-door me-2"></i>
                                Landing page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/profile"><i class="icon-mid bi bi-person me-2"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/change-password"><i class="icon-mid bi bi-lock me-2"></i>
                                Change password
                            </a>
                        </li>
                        <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="POST" class="form-logout">
                                @csrf
                                <a class="dropdown-item btn-logout" href="#"><i
                                        class="icon-mid bi bi-box-arrow-left me-2 btn-logout"></i>
                                    <span class="btn-logout">Logout</span></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
