@extends('layouts.app')
@section('title')
Add Tag
@endsection
@section('content')
<div class="card">
 <div class="card-header">
        <h3 class="card-title">Add Tag</h3>
 </div>
    <div class="card-body">
        <form action="{{ route('tag.store')}}" method="post">
         {{ csrf_field() }}
            <div class="form-group">
              <label for="tag"> Add tags</label>
              <input type="text" name="tag" class="form-control">
            </div> 
            @error('tag')
              <p class="text-danger">{{ $message }}</p>
           @enderror 
            <div class="form-group mt-3">
                <button class="btn btn-success" type="submit">Store Tags</button>
            </div>
        </form>
   
</div>
</div>

@endsection