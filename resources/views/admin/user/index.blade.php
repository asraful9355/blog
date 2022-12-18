@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Users</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                 $count = 0;
                @endphp

                @foreach($users as $user)
                    <tr>
                        <td>{{ $count= $count+1 }}</td>
                        <td><img src="{{ $user->profile_photo_path }}" alt="{{ $user->name }}" width="50" height="50" class="rounded"></td>
                        <td>{{ $user->name }}</td>
                        <td>
                        @if($user->admin)
                         <a href="{{ route('user.not.admin',['id'=>$user->id ])}}" class="btn btn-danger btn-sm">Remove Permission</a>
                        @else
                        <a href="{{ route('user.admin',['id'=>$user->id ])}}" class="btn btn-success btn-sm">Make Admin</a>
                        @endif
                      </td>
                      
                        <td>Edit Profile</td>
                        <td>Account Delete</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection