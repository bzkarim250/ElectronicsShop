@extends('dashboard.admin.adminlayout')
@section('content')

<div class="card"style="margin-left:40vh;font-size:30px;margin-top:60px">
  <div class="card-header">User Page</div>
        <div class="card-body">
        <h5 class="card-title" style="font-size:30px">Name : {{ $user->name }}</h5>
        <p class="card-text">ID : {{ $user->id }}</p>
        <p class="card-text">Email : {{ $user->email }}</p>
        <p class="card-text">Created At : {{ $user->created_at }}</p>
        <p class="card-text">Updated At: {{ $user->updated_at}}</p>
  </div>
      
    </hr>
  
  </div>
</div>

@endsection