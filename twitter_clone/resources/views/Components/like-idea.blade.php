@props(['idea'])

@if ($idea->liked(Auth::user()))
<form action="{{route('user.unlike',$idea)}}" method="POST">
    @csrf
    <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart text-danger me-1">
        </span> {{$idea->likes_count}} </button>
</form>
@else
<form action="{{route('user.like',$idea)}}" method="POST">
    @csrf
    <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
        </span> {{$idea->likes_count}} </button>
</form>
@endif