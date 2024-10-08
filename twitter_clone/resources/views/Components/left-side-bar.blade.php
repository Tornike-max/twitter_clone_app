<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="nav-link {{Route::is('dashboard') ? 'text-white bg-primary rounded' : 'text-dark'}} "
                        href="{{route('dashboard')}}">
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('terms') ? 'text-white bg-primary rounded' : 'text-dark'}}"
                        href="{{route('terms')}}">
                        <span>Terms</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Support</span></a>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center py-2">
            <a class="btn btn-link btn-sm" href="{{route('user.profile',Auth::user()->id)}}">View Profile </a>

            <div class="d-flex justify-content-center align-items-center gap-2">
                <a href="{{route('lang','en')}}">EN</a>
                <span>|</span>
                <a href="{{route('lang','es')}}">ES</a>
            </div>
        </div>
    </div>
</div>