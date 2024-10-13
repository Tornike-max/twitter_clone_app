@section('title', 'Admin')

<x-admin-layout>
    <form method="POST" action="{{route('admin.user.update',$user->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter your name">
            <small class="form-text text-muted">Please provide your full name.</small>
        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}"
                placeholder="Enter your email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group mb-4">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="admin" {{ $user->status == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="editor" {{ $user->status == 'editor' ? 'selected' : '' }}>Editor</option>
                <option value="user" {{ $user->status == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success btn-lg w-100">Update Profile</button>
    </form>

</x-admin-layout>