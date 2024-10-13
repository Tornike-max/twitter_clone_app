@section('title', 'Admin')

<x-admin-layout>
    <a class="btn btn-primary" href="{{route('admin.dashboard')}}">Go Back</a>

    <form method="POST" action="{{route('admin.idea.update',$idea->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="content" class="form-label mt-2">Content</label>
            <textarea class="form-control" name="content">{{$idea->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-success btn-lg w-100">Update Idea</button>
    </form>

</x-admin-layout>