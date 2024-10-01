<h4> Share yours ideas </h4>
<form method="POST" action="{{route('idea.store')}}" class="row">
    @csrf
    <div class="mb-3">
        <textarea class="form-control" id="idea" name="content" rows="3"></textarea>
    </div>
    @error('content')
    <span class="text-danger pb-3">{{$message}}</span>
    @enderror
    <div>
        <button type="submit" class="btn btn-dark"> Share </button>
    </div>
</form>