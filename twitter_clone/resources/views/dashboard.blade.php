<x-layout>
    @if (session()->has('success'))
    <x-success-message :message="session('success')" />
    @endif
    <x-submit-idea />
    <hr>
    @forelse ($ideas as $idea)
    <div class="mt-3">
        <x-idea-card :$idea />
    </div>
    @empty
    <h1>No Results Found</h1>
    @endforelse
    <div class="mt-4">
        {{$ideas->links()}}
    </div>
</x-layout>