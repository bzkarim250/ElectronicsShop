@extends('dashboard.admin.adminlayout')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>ElectronicsShop Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="introduction">
  <div class="card" style="width:30% ;">
    <div class="card-element">
      <h3>products</h3>
      <h4>0</h4>
    </div>
  </div>
  <div class="card" style="width:30% ;">
    <div class="card-element">
      <h3>Orders</h3>
      <h4>0</h4>
    </div>
  </div>

  <div class="card" style="width:30% ;">
    <div class="card-element">
      <h3>Users</h3>
      <h4>0</h4>
    </div>
  </div>
</div>



</main><!-- End #main -->

@endsection