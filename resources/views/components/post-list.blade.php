<div class="m-4 p-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($posts as $post )
        <div class="col mb-3">
          
            <div class="card">
              <a href="{{ route('posts.show', ['post'=>$post->id]) }}">
              @if ($post->image)
                <img src="{{ '/storage/images/'.$post->image }}" class="card-img-top p-2 mt-3 ml-auto mr-auto" style="width:60%" alt="my post">
              @else
                <img src="{{ '/storage/images/'.'no_image.png' }}" class="card-img-top p-2 mt-3 ml-auto mr-auto" style="width:60%" alt="no image">
              @endif
              
              <div class="card-body">
                <h5 class="card-title text-xl font-bold">{{ $post->title }}</h5>
              </a>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->writer->name}}</h6><hr>
                {{-- html 글자수 제한, 뒤에 생략하기. 밑에는 링크 --}}
                {{-- https://m.blog.naver.com/PostView.naver?isHttpsRedirect=true&blogId=kjcc2012&logNo=220640250414 --}}
                <p class="card-text mt-3" style="width:130px; text-overflow:ellipsis; white-space:nowrap; overflow:hidden; ">{{ $post->content }}</p>
              </div>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small>
            </div>
          
        </div>
        @endforeach
    </div>
    {{ $posts->links(); }}
</div>