<div class="m-4 p-3">
    <div class="card mb-3">
        <div class="row">
          <div class="col">
            @if ($post->image)
            <img src="{{ '/storage/images/'.$post->image }}" class="card-img-top p-3 mt-4 ml-auto mr-auto" alt="my post image" style="width:100%">  
            @else
            <img src="{{ '/storage/images/'.'no_image.png' }}" class="img-fluid rounded-start" alt="no image" style="width:100%">
            @endif
            
          </div>
          <div class="col-md-8">
            <div class="card-body mt-3">
              <h5 class="card-title text-2xl md:font-black">{{ $post->title }}</h5>
              <div class="flex justify-between">
                <h6 class="card-subtitle mb-2 text-lg text-muted">{{ $post->writer->name}}</h6>
                <like-button class="ml-3" :post="{{ $post }}" :loginuser="{{ auth()->user()->id }}"/>
              </div>
              <hr>
              <p class="card-text text-lg md:font-bold mt-3 mb-4">{{ $post->content }}</p>
              <p class="card-text mb-2 text-lg text-muted">Created {{ $post->created_at }}</p>
              <p class="card-text mb-2 text-lg text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</p>
            </div>
          </div>
        </div>
        <div class="card-body flex">
          <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="card-link">Update</a>
            <form class="ml-4" action="{{ route('posts.destroy', ['post'=>$post->id]) }}" method="post" id="form">
              @csrf
              @method('delete')
              <button onclick="onDelete(event)" type="submit" >Delete</button>
            </form>
            
        </div>
    </div>
    <script>
      function onDelete(e) {
        sudo = confirm('삭제하시겠습니까?');
        if(!sudo){
          e.preventDefault();
        }
      }
    </script>

</div>