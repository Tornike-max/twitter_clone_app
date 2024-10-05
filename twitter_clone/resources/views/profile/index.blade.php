<x-layout>
    @if (session()->has('error'))
    <x-error-message :message="session('error')" />
    @endif

    @if (session()->has('success'))
    <x-success-message :message="session('success')" />
    @endif
    <x-user-card :$user :$commentsCount :$ideasCount :$followersCount :$editing />

    <hr />

    @if (!empty($ideas))
    @foreach ($ideas as $idea)
    <x-idea-card :$idea />
    @endforeach
    <div class="my-2">
        {{$ideas->links()}}
    </div>
    @endif

</x-layout>