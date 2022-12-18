@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Post</h3>
    </div>
    <div class="card-body">
      @if($posts->count() > 0)
      
            <table class="table">
                <thead>
                    <tr>
                        <th>Id.</th>
                        <th>Featured</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                @foreach($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="80" style="height: 50px;"></td>
                            <td><i>{{ $post->title }}</i></td>
                            <td>{{ Str::limit ( $post->content,10) }}</td>
                            <td>
                                <a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-info btn-sm text-light"><i class="fa-solid fa-eye"></i> Edit</a>
                                <a href="{{ route('post.delete',['id' => $post->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left"></i> Trash</a>
                            </td>
                        </tr>
                @endforeach
                 
                </tbody>

            </table>
          {!! $posts->links() !!}
            @else
            <h3 class="text-center p-5">There Are No Post Yet.</h3>
        @endif
       
    </div>
</div>
@endsection


