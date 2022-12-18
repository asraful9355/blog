@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add category</h3>
    </div>
    <div class="card-body">

    <form action="{{route('category.store')}}" method="post">
    {{ csrf_field() }}
        	
        	<div class="mb-3">
        		<label for="name" class="">Name:</label>
        		<input type="text" class="form-control text-center" name="name" placeholder="Add Category Name" id="name" value="">
               
        	</div>
        	<input type="submit" class="btn btn-success" value="Add Category">
        </form>
    </div>
</div>
@endsection
