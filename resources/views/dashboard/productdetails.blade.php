@extends ('layouts.base')
@section('content')
<style>

  </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add New Product Details
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Add New Product Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('create-details')}}" method="post">
            @csrf
            <div class="row">
              <div class="col">
                <label for="product" class="text-dark">Select Product</label>
                <select class="form-select" id="product" name="product">
                  @foreach($products as $item)
                  <option class="text-dark" value="{{$item->id}}"> "{{$item->productname}}</option>
                  @endforeach
                  </select>
              </div>
            </div>
           <div class="row">
            <div class="col">
              <label for="color" class="text-dark">color</label>
            <input type="text" id="color" class="form-control" name="color">
            </div>
            <div class="col">
              <label for="price" class="text-dark">price</label>
            <input type="text" id="price" class="form-control" name="price">
            </div>

           </div>

           <div class="row">
            <div class="col">
                <label for="qty" class="text-dark">Quantity</label>
                <input type="text" id="qty" class="form-control" name="qty">
            </div>
            <div class="col">
              <label for="des" class="text-dark">Description</label>
              <input type="text" id="des" class="form-control" name="des">
            </div>
        </div>

            <button type="submit" class="btn btn-info mt-2">save</button>
            <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">cancel</button>
          </form>
        </div>
      
      </div>
    </div>
  </div>
        </div>

    </div>

    <div class="row mt-5 " style="color: black;">
        <div class="col"><div class="card">
            <div class="card-body">

              <div class="row mt-5">
                <div class="col">
                  <div class="error-messages " >
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul>
                  </div>

              @endif
            </div>

                  <form action="#" method="post">
                    $csrf
                    <input type="text" name="name" class="form-control">
                    <button type="submit" class="btn btn-primary mt-3">Search</button>

                  </form>

                </div>

              </div>

                <table class="table table striped text-center">
                    <thead>
                        <th>ID</th>
                        <th>Product Details ID </th>
                        <th>Product Name</th>
                        <th>color</th>
                        <th>price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Action</th>

                        

                    </thead>
                    <tbody class="text-center">
                        @foreach($productdetails as $items)
                        <tr>
                        <td>{{$items->id}}</td>
                        <td>{{$items->productid}}</td>
                        <td>{{$items->productname}}</td> <!--the (s) in items ????????????????/-->
                        <td>{{$items->color}}</td>
                        <td>{{$items->price}} SAR</td>
                        <td>{{$items->qty}}</td>
                        <td>{{$items->description}}</td>

                        
                        <td><a href="{{route('del',['id'=>$items->id])}}" > <i class="fa fa-trash text-danger" aria-hidden="true"></i> </td></a>
                        <td><a href="{{route('edit',['id'=>$items->id])}}"><i class="fa fa-edit text-success" aria-hidden="true"></i></td></a>
                      
                    </tr>
                        @endforeach
                    </tbody>
                   

                </div>
              </table>
        </div></div>
    </div>
   <script>
    function setValue(id,name){
      alert(name);
    }
   </script>
</div>
@endsection