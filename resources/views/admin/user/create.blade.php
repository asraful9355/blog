@extends('layouts.app')
@section('title')
Add Users
@endsection
@section('content')
<div class="card">
 <div class="card-header">
        <h3 class="card-title">Add Users</h3>
 </div>
    <div class="card-body">
    
        <form action="{{ route('user.store')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" name="name" class="form-control">
            </div> 
             @error('name')
              <p class="text-danger">{{ $message }}</p>
           @enderror
           <div class="form-group mt-3">
              <label for="featured">Email</label>
              <input type="email" name="email" class="form-control">
            </div> 
            @error('email')
              <p class="text-danger">{{ $message }}</p>
           @enderror


           <div class="form-group">
                 <label for="profile_photo_path">Featured Image</label>
                 <input type="file" name="profile_photo_path"  class="form-control">
            </div>
            @error('profile_photo_path')
              <p class="text-danger">{{ $message }}</p>
           @enderror


            <div class="form-group mt-3">
                <button class="btn btn-success" type="submit">Add Users</button>
            </div>
            </form>
   
</div>
</div>

@endsection