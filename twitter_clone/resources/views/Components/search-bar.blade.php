<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">Search</h5>
    </div>
    <form method="GET" action="{{route('dashboard')}}" class="card-body">
        <input placeholder="...
        " class="form-control w-100" type="text" id="search" name="query">
        @error('query')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <button class="btn btn-dark mt-2" type="submit"> Search</button>
    </form>
</div>