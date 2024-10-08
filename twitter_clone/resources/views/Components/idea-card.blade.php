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
                @if (!Route::is('ideas.show'))
                <a href="{{route('ideas.show',$idea->id)}}" class="btn btn-success btn-sm">View</a>
                @endif
                @if ($editing === true)
                @if (Auth::user()->id === $idea->user->id)
                <a href="{{route('ideas.edit',$idea->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                @endif
                @endif
                @if (Auth::user()->id === $idea->user->id)
                <form method="POST" action="{{route('idea.destroy',$idea->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
        <div class="d-flex justify-content-between">
            <x-like-idea :$idea />
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at->diffForHumans()}} </span>
            </div>
        </div>
        <x-idea-comments-box :$idea />
    </div>
</div>