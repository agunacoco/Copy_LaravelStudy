<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Write') }}
        </h2>
        <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-info text-white hover:bg-blue-700">Post List</button>
    </x-slo
    
</x-app-layout>
