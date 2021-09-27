<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Post Write') }}
            </h2>
            <button onclick=location.href="{{ route('posts.show', ['post'=>$post->id]) }}" type="button" class="btn btn-info text-white hover:bg-blue-700">Post</button>
        </div>
    </x-slot>
    <div class="p-5">
        <form id="editForm" action="{{route('posts.update', ['post'=>$post->id])}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('put')
            <div class="form-group">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                    @error('title')
                        <div class="text-red-600">{{ $message }} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                    @error('content')
                        <div class="text-red-600">{{ $message }} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if ($post->image)
                        <img src="{{ '/storage/images/'.$post->image }}" alt="post_image" style="width:50%" />
                        <button class="btn btn-outline-secondary btn-sm mt-3" onclick="return deleteImage()">Image Delete</button>
                    @else
                        <img src="{{ '/storage/images/'.'no_image.png' }}" alt="no_image" style="width:50%" />
                    @endif
                    <input class="form-control mt-3" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary hover:bg-blue-700">Submit</button>
            </div>
        </form>
        <script>
            function deleteImage() {
                editForm = document.getElementById('editForm');
                editForm._method.value="delete";
                editForm.action="/posts/{{ $post->id }}/image";
                editForm.submit();
                return false;
            }
        </script>
    </div>
    
</x-app-layout>
