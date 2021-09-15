<div class="m-4 p-4">
    <table class="table table-hover p-10">
        <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Writer</th>
              <th scope="col">Update</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post )
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->writer->name }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach  
        </tbody> 
    </table>

    
</div>