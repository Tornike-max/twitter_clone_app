@props(['idea','editing'=>false])

<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{$idea->user->getImageUrl()}}"
                    alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('user.show',$idea->user->id)}}"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{route('ideas.show',$idea->id)}}" class="btn btn-success btn-sm">View</a>
                @if ($editing === true)
                <a href="{{route('ideas.edit',$idea->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                @endif
                <form method="POST" action="{{route('idea.destroy',$idea->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
        <div class="d-flex justify-content-between">
            @if ($idea->liked(Auth::user()))
            <form action="{{route('user.unlike',$idea)}}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart text-danger me-1">
                    </span> {{count($idea->likes)}} </button>
            </form>
            @else
            <form action="{{route('user.like',$idea)}}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart text-secondary me-1">
                    </span> {{count($idea->likes)}} </button>
            </form>
            @endif
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at}} </span>
            </div>
        </div>
        <x-idea-comments-box :$idea />
    </div>
</div>