@section('title', 'Admin')

<x-admin-layout>
    <div class="card">
        <h5 class="card-header">{{$user->name}}</h5>
        <a class="btn btn-primary" href="{{route('admin.dashboard')}}">Go Back</a>
        <div class="card-body">
            <h5 class="card-title">{{$user->email}}</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <div class="d-flex justify-content-start align-items-center gap-2">
                <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{route('admin.user.delete',$user->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-secondary btn-sm" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>