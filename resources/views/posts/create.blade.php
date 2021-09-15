<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Write') }}
        </h2>
        <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-info text-white hover:bg-blue-700">Post List</button>
    </x-slot>
    <div class="p-5">
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="제목을 입력해주세요." value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-600">{{ $message }} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="내용을 입력해주세요.">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-red-600">{{ $message }} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary hover:bg-blue-700">Submit</button>
            </div>
        </form>
    </div>
    
</x-app-layout>
