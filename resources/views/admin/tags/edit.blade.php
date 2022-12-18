@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Tag</h3>
    </div>
    <div class="card-body">

    <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
    {{ csrf_field() }}

           <div class="mb-3">
        		<label for="name" class="">Name:</label>
        		<input type="text" class="form-control text-center" name="name" placeholder="Update Tag Name" id="name" value="{{ $tag->tag }}">
               
        	</div>
        	<input type="submit" class="btn btn-success">
        </form>
    </div>
</div>
@endsection