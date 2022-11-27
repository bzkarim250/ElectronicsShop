@extends('dashboard.admin.adminlayout')
@section('content')

  <main id="main" class="main">

<div class="pagetitle">
  <h1>All Supplies</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Supplies</li>
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
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($supplier as $user)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                <a href="#" title="View"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                <a href="/register/{{$user->id}}" title="Approve"><button class="btn bg-success btn-sm"><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Approve</button></a>

                  <form method="post" action="/supplier/delete/{{$user->id}}" accept-charset="UTF-8"style="display:inline">
                                                {{ csrf_field() }}
                                                @method('Delete')
                                                <button type="submit" class="btn btn-danger btn-sm" title="" onclick="return confirm(&quot;Do you want to reject request?&quot;)""><i class="bi bi-x" aria-hidden="true"></i>Reject</button>
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