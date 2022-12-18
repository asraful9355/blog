<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('title')</title>
        
        
         <!-- fontawesome -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
         
         
        <!-- Styles -->
        
        
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
        
        

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
        <!-- for toastr -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <!-- include summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 ">
            @livewire('navigation-menu')

            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="list-group">
                            <a href="{{ route('category.all')}}" class="list-group-item list-group-action {{'all-category'== request()->path()?'active': ''}}">All Category</a>
                            <a href="{{ route('category.add')}}" class="list-group-item list-group-action {{'add-category'== request()->path()?'active': ''}}">Add Category</a>
                            <a href="{{ route('post.create') }}" class="list-group-item list-group-action {{'post/create'== request()->path()?'active': ''}}">Add Post</a>
                            <a href="{{ route('post.index')}}" class="list-group-item list-group-action  {{'post/index'== request()->path()?'active': ''}}">All Post</a>
                            <a href="{{ route('post.trash')}}" class="list-group-item list-group-action {{'post/trash'== request()->path()?'active': ''}}">All Trashed Post</a>
                            <a href="{{ route('tag.create')}}" class="list-group-item list-group-action {{'tag/create'== request()->path()?'active': ''}}">Add Tag</a>
                            <a href="{{ route('tag.all')}}" class="list-group-item list-group-action {{'tag/all'== request()->path()?'active': ''}}">All Tag</a>
                            <a href="{{ route('user.index') }}" class="list-group-item list-group-action {{'users'== request()->path()?'active': ''}}">All User</a>
                            <a href="{{ route('user.create') }}" class="list-group-item list-group-action
                            {{'users/create'== request()->path()?'active': ''}}">Add Users</a>
                            <a href="{{ route('my.profile') }}" class="list-group-item list-group-action {{'my/profile'== request()->path()?'active': ''}} ">My Profile</a>
                            <a href="{{ route('change.profile') }}" class="list-group-item list-group-action  {{'my/change/profile'== request()->path()?'active': ''}}">Change Profile</a>
                            <a href="{{route('setting.index') }}" class="list-group-item list-group-action  {{'setting/index'== request()->path()?'active': ''}}">Settings</a>
                            <a href="#" class="list-group-item list-group-action">Item-1</a>
                            <a href="#" class="list-group-item list-group-action">Item-1</a>
                            <a href="#" class="list-group-item list-group-action">Item-1</a>
                            <a href="#" class="list-group-item list-group-action">Item-1</a>
                            <a href="#" class="list-group-item list-group-action">Item-1</a>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                    @yield('content')
                    </div>
                </div>
        </div>

        </div>
   

        @stack('modals')

        @livewireScripts
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

       <!-- include summernote js -->
       <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
      <script> 
        $(document).ready(function() {
        $('#content').summernote();
        });
       </script>
        
    </body>
</html>
