@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Settings</h3>
    </div>
    <div class="card-body">
  
        <table class="table">
            <thead>
                <tr>
                   
                    <th>Site Name</th>
                    <th>Contact No </th>
                    <th>Contact Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              
              
            
              <tr>
                    <td>{{$setting->site_name}}</td>
                    <td>{{$setting->contact_number}}</td>
                    <td>{{$setting->contact_email}}</td>
                    <td>{{$setting->address}}</td>
                    <td>
                        <a href="{{ route('setting.edit',['id' => $setting->id ]) }}" class="btn btn-primary btn-sm"> <i class="fa-solid fa-eye"></i> Edit</a>
                     
                    </td>
                </tr>
               
            </tbody>

        </table>
       
    </div>
</div>
@endsection

