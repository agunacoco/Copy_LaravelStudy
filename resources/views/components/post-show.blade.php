<div class="m-4 p-3">
    <div class="card mb-3">
        <div class="row">
          <div class="col">
            @if ($post->image)
            <img src="{{ '/storage/images/'.$post->image }}" class="card-img-top p-2 mt-3 ml-auto mr-auto" alt="my post image" style="width:100%">  
            @else
            <img src="{{ '/storage/images/'.'no_image.png' }}" class="img-fluid rounded-start" alt="no image" style="width:100%">
            @endif
            
          </div>
          <div class="col-md-8">
            <div class="card-body mt-3">
              <h5 class="card-title text-2xl md:font-black">{{ $post->title }}</h5>
              <h6 class="card-subtitle mb-2 text-lg text-muted">{{ $post->writer->name}}</h6><hr>
              <p class="card-text text-lg md:font-bold mt-3 mb-4">{{ $post->content }}</p>
              <p class="card-text mb-2 text-lg text-muted">Created {{ $post->created_at }}</p>
              <p class="card-text mb-2 text-lg text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</p>
            </div>
          </div>
        </div>
        <div class="card-body">
            <a href="" class="card-link">Update</a>
            <a href="" class="card-link">Delete</a>
        </div>
    </div>

</div>