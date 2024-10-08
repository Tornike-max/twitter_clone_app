@auth
<h4>{{trans('ideas.share_ideas')}}</h4>
@endauth
@guest
<h4>{{trans('ideas.login_to_share')}}</h4>
@endguest
<form method="POST" action="{{route('idea.store')}}" class="row">
    @csrf
    <div class="mb-3">
        <textarea class="form-control" id="idea" name="content" rows="3"></textarea>
    </div>
    @error('content')
    <span class="text-danger pb-3">{{$message}}</span>
    @enderror
    <div>
        <button type="submit" class="btn btn-dark"> {{trans('ideas.share')}} </button>
    </div>
</form>