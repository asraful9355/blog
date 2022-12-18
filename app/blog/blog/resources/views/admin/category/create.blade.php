@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Category</h3>
    </div>
    <div class="card-body">
        <!-- @if(count($errors) > 0)
          <ul class="list-group">
              @foreach($errors->all() as $error)
              <li class="list-group-item text-danger">
                  {{ $error }}
              </li>
              @endforeach
          </ul>
        @endif -->
        @if(Session::has('status'))
            <div class="alert alert-success">
                {{ Session::get('status') }}
            </div>
        @endif

        <form action="{{ route('category.store') }}" method="post">
        	{{ csrf_field() }}
        	<div class="mb-3">
        		<label for="name" class="">Name:</label>
        		<input type="text" class="form-control" name="name" placeholder="Enter The Category Name" id="name" value="">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        	</div>
        	<input type="submit" class="btn btn-success" value="Add Category">
        </form>
    </div>
</div>
@endsection