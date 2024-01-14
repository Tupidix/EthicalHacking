<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ route('create-message') }}" class="btn btn-primary">Create Message</a>
    </x-slot>
</x-app-layout>
