@extends('layouts.app')
@section('title')
Add Users
@endsection
@section('content')
<div class="card">
 <div class="card-header">
        <h3 class="card-title">Update Profile</h3>
 </div>
    <div class="card-body">
    
        <form action="{{  route('update.profile',['id'=>$users->id]) }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" name="name" class="form-control" value="{{ $users->name }}">
            </div> 
             @error('name')
              <p class="text-danger">{{ $message }}</p>
           @enderror
           <div class="form-group mt-3">
              <label for="featured">Email</label>
              <input type="email" name="email" class="form-control"  value="{{ $users->email}}">
            </div> 
            @error('email')
              <p class="text-danger">{{ $message }}</p>
            @enderror


           <div class="form-group mt-3">
              <label for="title">Facebook</label>
              <input type="text" name="facebook" class="form-control"  value="{{ $profile->facebook }}">
            </div> 
            @error('facebook')
              <p class="text-danger">{{ $message }}</p>
            @enderror



            <div class="form-group mt-3">
              <label for="title">Youtube</label>
              <input type="text" name="youtube" class="form-control"  value="{{ $profile->youtube }}">
            </div> 
            @error('youtube')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group mt-3">
              <label for="title">Twitter</label>
              <input type="text" name="twitter" class="form-control"  value="{{ $profile->twitter }}">
            </div> 
            @error('twitter')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group mt-3">
              <label for="title">Mobaile</label>
              <input type="number" name="mobaile" class="form-control"  value="{{ $profile->mobaile }}">
            </div> 
            @error('mobaile')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group mt-3">
              <label for="title">Address</label>
              <input type="text" name="address" class="form-control"  value="{{ $profile->address }}">
            </div> 
            @error('address')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group mt-3">
              <label for="title">Git Hub</label>
              <input type="text" name="github" class="form-control"  value="{{ $profile->github }}">
            </div> 
            @error('github')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group mt-3">
              <label for="title">Globe</label>
              <input type="text" name="globe" class="form-control"  value="{{ $profile->globe }}">
            </div> 
            @error('globe')
              <p class="text-danger">{{ $message }}</p>
            @enderror


           <div class="form-group mt-3">
                 <label for="profile_photo_path">My Profile Picture</label>
                 <input type="file" name="profile_photo_path"  class="form-control">
            </div>
           

            <div class="form-group mt-3">
                <button class="btn btn-success" type="submit">Updated Profile</button>
            </div>
            </form>
   
</div>
</div>

@endsection