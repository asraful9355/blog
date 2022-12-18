@extends('layouts.app')
@section('title')
All Trash Post
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Trash</h3>
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
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="80" style="height: 50px;"></td>
                            <td><i>{{ $post->title }}</i></td>
                            <td>{{ $post->content }}</td>
                            <td>
                                <a href="{{ route('post.restore',['id' => $post->id]) }}" class="btn btn-info btn-sm text-light"> <i class="fa-solid fa-window-restore"></i> Restore</a>
                                <a href="{{ route('post.kill',['id' => $post->id]) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</a>
                            </td>
                        </tr>
                @endforeach
                 
                </tbody>

            </table>
            @else
            <h3 class="text-center p-5">There Are No Trash Yet.</h3>
        @endif
       
    </div>
</div>
@endsection


