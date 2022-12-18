@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Settings</h3>
    </div>
    <div class="card-body">

    <form action="{{route('setting.update',['id'=> $setting->id])}}" method="post">
      {{ csrf_field() }}

           <div class="mb-3">
        		<label for="name" class="">Site Name</label>
        		<input type="text" class="form-control text-center" name="site_name"  id="name" value="{{ $setting->site_name }}">
            </div>
            @error('site_name')
             <p class=" text-danger">{{ $message}}</p>
            @enderror
           <div class="mb-3">
        		<label for="name" class="">Contact Number</label>
        		<input type="number" class="form-control text-center" name="contact_number"  value="{{ $setting->contact_number }}">
        	</div>
            @error('contact_number')
             <p class=" text-danger">{{ $message}}</p>
            @enderror
           <div class="mb-3">
        		<label for="name" class="">Contact Email</label>
        		<input type="email" class="form-control text-center" name="contact_email"  value="{{ $setting->contact_email }}">
        	</div>
            @error('contact_email')
             <p class=" text-danger">{{ $message}}</p>
            @enderror
           <div class="mb-3">
        		<label for="name" class="">Address</label>
        		<input type="text" class="form-control text-center" name="address"  value="{{ $setting->address }}">
           </div>
           @error('address')
             <p class=" text-danger">{{ $message}}</p>
            @enderror
         
        	<input type="submit" class="btn btn-success">
        </form>
    </div>
</div>
@endsection