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
  <div class="card">
    <div class="card-element">
      <h3>PRODUCTS</h3>
      <h4>40</h4>
    </div>
  </div>
  <div class="card">
    <div class="card-element">
      <h3>ORDERS</h3>
      <h4>6</h4>
    </div>
  </div>
  @role('admin')
  <div class="card">
    <div class="card-element">
      <h3>USERS</h3>
      <h4>20</h4>
    </div>
  </div>
  <div class="card">
    <div class="card-element">
      <h3>APPLICATIONS</h3>
      <h4>10</h4>
    </div>
  </div>
</div>
@endrole



</main><!-- End #main -->

@endsection