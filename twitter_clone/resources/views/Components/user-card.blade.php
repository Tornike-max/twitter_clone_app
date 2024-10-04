@props(['user','commentsCount' ,'ideasCount','editing'])

<div>
    <div class=" card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-start justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{$user->getImageUrl()}}"
                        alt="{{$user->name}}">
                    <div>
                        @if ($editing)
                        <form method="POST" action="{{route('user.update',$user->id)}}"
                            class="w-100 d-flex flex-column justify-content-center align-items-start gap-2">
                            @csrf
                            @method('PUT')
                            <input class="form-control w-100" type="text" name="name" value="{{$user->name}}" />
                            <input class="form-control w-100" type="text" name="email" value="{{$user->email}}" />
                            <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                        </form>
                        @else
                        <h3 class="card-title mb-0"><a href="#">{{$user->name}}
                            </a></h3>
                        <span class="fs-6 text-muted">{{'@'.$user->name}}</span>
                        @endif
                    </div>
                </div>
                @if ($editing)
                <a href="{{route('user.show',$user->id)}}" class="btn btn-primary btn-sm">Go Back</a>
                @else
                <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                @endif
            </div>
            @if ($editing)
            <form enctype="multipart/form-data" method="POST" action="{{route('user.update',$user->id)}}" class="m-4">
                @csrf
                @method('PUT')
                <label class="">Update Profile Picture</label>
                <input type="file" name="image" class="form-control" />
                <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
            </form>

            @endif

            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                @if ($editing)
                <form method="POST" action="{{route('user.update',$user->id)}}">
                    @csrf
                    @method('PUT')
                    <textarea class="fs-6 px-3 w-100 fw-light" name="bio">{{$user->bio}}</textarea>
                    <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                </form>
                @else
                <p class="fs-6 fw-light">
                    {{$user->bio}}
                </p>
                @endif

                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{$ideasCount}} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{$commentsCount}} </a>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm"> Follow </button>
                </div>
            </div>
        </div>
    </div>
</div>