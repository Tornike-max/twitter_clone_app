<x-layout>
    @if (session()->has('success'))
    <x-idea-success-message :message="session('success')" />
    @endif
    <x-idea-card :$idea :editing="true" />
</x-layout>