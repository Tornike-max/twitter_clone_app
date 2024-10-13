@section('title', 'Admin')

<x-admin-layout>
    @if (session()->has('success'))
    <x-success-message :message="session('success')" />
    @endif
    <h1>Admin Panel</h1>

    <div class="w-100 d-flex justify-content-center align-items-center flex-column gap-2">
        <table class="table">
            <h2 class="text-start">Users List</h2>

            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registered At</th>
                    <th scope="col text-end ">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-nowrap">{{$user->created_at}}</td>
                    <td class="d-flex justify-content-start align-items-center gap-1">
                        <a href="{{route('admin.user',$user->id)}}" class="btn btn-primary btn-sm">See</a>
                        <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                        <form method="POST" action="{{route('admin.user.delete',$user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-secondary btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table">
            <h2>Ideas List</h1>
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Author</th>
                        <th scope="col">content</th>
                        <th scope="col">Created At</th>
                        <th scope="col text-end ">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ideas as $idea)
                    <tr>
                        <th scope="row">{{$idea->id}}</th>
                        <td>{{$idea->user->name}}</td>
                        <td>{{$idea->content}}</td>
                        <td class="text-nowrap">{{$idea->created_at}}</td>
                        <td class="d-flex justify-content-start align-items-center gap-1">
                            <a href="{{route('admin.idea',$idea->id)}}" class="btn btn-primary btn-sm">See</a>
                            <a href="{{route('admin.idea.edit',$idea->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="{{route('admin.idea.delete',$idea->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-secondary btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</x-admin-layout>