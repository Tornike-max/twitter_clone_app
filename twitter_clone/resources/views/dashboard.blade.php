<x-layout>
    @if (session()->has('success'))
    <x-idea-success-message :message="session('success')" />
    @endif
    <x-submit-idea />
    <hr>
    @foreach ($ideas as $idea)
    <div class="mt-3">
        <x-idea-card :$idea />
    </div>
    @endforeach
    <div class="mt-4">
        {{$ideas->links()}}
    </div>
</x-layout>