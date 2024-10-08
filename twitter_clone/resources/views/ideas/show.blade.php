@section('title','Idea')


<x-layout>
    @if (session()->has('success'))
    <x-success-message :message="session('success')" />
    @endif
    <x-idea-card :$idea :editing="true" />
</x-layout>