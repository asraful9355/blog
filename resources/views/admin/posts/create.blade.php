@extends('layouts.app')
@section('content')
<div class="card">
 <div class="card-header">
     <div class="card-title">Add Post</div>
 </div>
   <div class="card-body">
 
    
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
     {{csrf_field()}}

     <div class="form-group">
       <label for="title">Title</label>
       <input type="text" name="title" id="title"  class="form-control" value="{{ old('title') }}" >
     </div>
      @error('title')
        <p class="text-danger">{{ $message }}</p>
      @enderror
     <div class="form-group">
       <label for="featured">Featured Image</label>
       <input type="file" name="featured"  class="form-control">
     </div>
     @error('featured')
        <p class="text-danger">{{ $message }}</p>
      @enderror
     <div class="form-group">
       <label for="category">Select a Category</label>
       <select name="category_id" id="category" class="form-control" value="{{ old('category_id') }}" >

        @foreach($categories as $category)
           <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
         
       </select>
      
       
     </div>
     @error('category_id')
        <p class="text-danger">{{ $message }}</p>
      @enderror
      <div class="mb-3">
                Choose Tags:
                @foreach($tags as $tag)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="" name="tags[]">
                      <label class="form-check-label" for="">{{ $tag->tag }}</label>
                    </div>
                @endforeach
      </div>
      @error('tags')
        <p class="text-danger">{{ $message }}</p>
      @enderror
     
     <div class="mb-3">
                <label for="content" class="">Content:</label>
                <textarea name="content" id="content" cols="30" rows="7" class="form-control" >{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
     <div class="form-group">
        <div class="text-left">
            <button class="btn btn-success" type="submit">Store post</button>
        </div>
     </div>   
    
     
</form>
 </div>


</div>
@endsection



