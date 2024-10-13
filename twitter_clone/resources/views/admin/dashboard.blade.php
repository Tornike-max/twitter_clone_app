@section('title', 'Admin')

<x-admin-layout>
    <h1>Admin Panel</h1>

    <div class="w-100 d-flex justify-content-center align-items-center">
        <table class="table">
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
                    <th scope="row">1</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-nowrap">{{$user->created_at}}</td>
                    <td class="d-flex justify-content-start align-items-center gap-1">
                        <a href="{{route('admin.user',$user->id)}}" class="btn btn-primary btn-sm">See</a>
                        <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                        <a class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>