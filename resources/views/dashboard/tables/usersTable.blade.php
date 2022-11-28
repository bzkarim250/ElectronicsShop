@extends('dashboard.admin.adminlayout')
@section('content')

  <main id="main" class="main">

<div class="pagetitle">
  <h1>All Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card" style="width:max-content">
        <div class="card-body">
          <h5 class="card-title">Users Table</h5>

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if($user->role_id==1)
                <td>Super Admin</td>
                @elseif($user->role_id==2)
                <td>Admin</td>
                @elseif($user->role_id==3)
                <td>Supplier</td>
                @else
                <td>Client</td>
                @endif
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                <a href="/users/{{$user->id}}" title="View"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                  <form method="post" action="/users/{{$user->id}}" accept-charset="UTF-8"style="display:inline">
                                                {{ csrf_field() }}
                                                @method('Delete')
                                                <button type="submit" class="btn btn-danger btn-sm" title="" onclick="return confirm(&quot;Do you want to delete user?&quot;)""><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Default Table Example -->
        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

@endsection