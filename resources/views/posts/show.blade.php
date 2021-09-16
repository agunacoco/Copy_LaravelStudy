<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Post') }}
            </h2>
            <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-info text-white hover:bg-blue-700">Post List</button>
        </div>
    </x-slot>
    <x-post-show :post="$post" />

</x-app-layout>
