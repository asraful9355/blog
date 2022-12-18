@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Category</h3>
    </div>
    <div class="card-body">
    @if($categories->count() > 0)
  
        <table class="table">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($categories as $cat)
              <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{route('category.edit',['id' => $cat->id])}}" class="btn btn-primary btn-sm"> <i class="fa-solid fa-eye"></i> Edit</a>
                        <a href="{{route('catgory.destroy',['id' => $cat->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</a>
                    </td>
             </tr>
              @endforeach
               
            </tbody>

        </table>
        @else
            <h3 class="text-center p-5">There Are No Category Yet.</h3>
        @endif

        
    </div>
</div>
@endsection

