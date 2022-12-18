@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Tag</h3>
    </div>
    <div class="card-body">
     @if($tags->count() > 0)
  
        <table class="table">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Tag</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
              
              
              @foreach($tags as $tag)
              <tr>
                    <td>{{ $tag->id}}</td>
                    <td>{{ $tag->tag }}</td>
                    <td>
                        <a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-primary btn-sm"> <i class="fa-solid fa-eye"></i> Edit</a>
                        <a href="{{route('tag.delete',['id'=>$tag->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>

        </table>
        @else
            <h3 class="text-center p-5">There Are NoTag Yet.</h3>
        @endif
    </div>
</div>
@endsection

