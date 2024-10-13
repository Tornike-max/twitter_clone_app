<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="nav-link {{Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : 'text-dark'}} "
                        href="{{route('admin.dashboard')}}">
                        <span>{{trans('ideas.list_home')}}</span></a>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center py-2">
            <a class="btn btn-link btn-sm"
                href="{{route('user.profile',Auth::user()->id)}}">{{trans('ideas.list_view_profile')}} </a>

            <div class="d-flex justify-content-center align-items-center gap-2">
                <a href="{{route('lang','en')}}">EN</a>
                <span>|</span>
                <a href="{{route('lang','es')}}">ES</a>
            </div>
        </div>
    </div>
</div>