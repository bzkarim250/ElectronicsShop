@extends('dashboard.admin.adminlayout')
@section('content')

  <main id="main" class="main">

<div class="pagetitle">
  <h1>All Products</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Products</li>
      <li class="breadcrumb-item active">All</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section" >
  <div class="row" style="display:flex">
    <div class="col-lg-6" style="width:70%;">

      <div class="card" style="width:max-content">
        <div class="card-body">
          <h5 class="card-title">All Products</h5>

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                <a href="#" title="View"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                <a href="/products/update/{id}" title="update"><button class="btn bg-success btn-sm"><i class="fa fa-edit" aria-hidden="true">Update</i></button></a>

                  <form method="post" action="/products/delete/{id}" accept-charset="UTF-8"style="display:inline">
                                                {{ csrf_field() }}
                                                @method('Delete')
                                                <button type="submit" class="btn btn-danger btn-sm" title="" onclick="return confirm(&quot;Do you want to delete the product?&quot;)""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
                                            </form></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Default Table Example -->
        </div>
      </div>


    </div>

  <!-- add -->
  <div class="col-lg-6" style="padding-left:10px; width:30%">
          <div class="card" style=" width: max-content;">
            <div class="card-body">
              <h5 class="card-title">Add New Product</h5>
              <form action="/products/create" class="product-form" method="Post" enctype='multipart/form-data'>
              {{csrf_field()}}
                <input type="text" name="title" class="form-control" placeholder="Tiltle" ><br>
                <input type="text" class="form-control" name="description" placeholder="Description" ><br>
                <label for="img">Select image:</label><br>
                <input type="file" accept="image/*" class="form-control-file" style="margin-bottom:10px; " name="image" ><br>
                <input type="text" class="form-control" name="price" placeholder="Price" ><br>
                <input type="text" class="form-control" name="color" placeholder="Color" ><br>
                <input type="text" class="form-control" name="size" placeholder="Size" ><br>
                <input type="text" class="form-control" name="categories" placeholder="Category" ><br>
                <input type="text" class="form-control" name="InStock" placeholder="Color" value=1 style="display:none" ><br>
                <input type="text" class="form-control" name="user_id" placeholder="Category" value=12 style="display:none" ><br>
                <input type="submit" class="btn btn-primary" value="Save"><br>
              </form>
            </div>
          </div>
          

         
            </div>

  <!-- end -->
  </div>
</section>

</main><!-- End #main -->

@endsection