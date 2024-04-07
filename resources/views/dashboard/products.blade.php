@extends ('layouts.base')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add New Product
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Add New Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('createproducts')}}" method="post">
            @csrf
            <input type="text" class="form-control" name="Productname">
            <button type="submit" class="btn btn-info mt-2">save</button>
            <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">cancel</button>
          </form>
        </div>
      
      </div>
    </div>
  </div>
        </div>

    </div>

    <div class="row mt-5 text-dark">
        <div class="col"><div class="card">
            <div class="card-body">


              </div>
              <div class="row mt-5">
                <div class="col">
                  <form action="#" method="get">
                    <div class="input-group"> 
                      <form action="{{route('search')}}" method="get"> </form>
                      <form  action="{{route('products')}}" method="get"></form>
                      <div class="row">
                        <div class="col">
                          
                    <input type="text" name="search" class="form-control">
                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                    <button type="submit" formaction="{{route('showall')}}" formmethod=get class="btn btn-primary mt-3">Show All</button>
                    
                  </div>
                  </div>
                  </div>
                  </form>

                </div>

              </div>

                <table class="table table striped text-center bg-dark">
                    <thead>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th colspan="2">Action</th>

                    </thead>
                    <tbody class="text-center">
                        @foreach($products as $items)
                        <tr>
                        <td>
                            {{$items->id}}
                        </td>
                        <td>
                            {{$items->productname}}
                        </td>
                        <td><a href="{{route('del',['id'=>$items['id']])}}" > <i class="fa fa-trash text-danger" aria-hidden="true"></i> </td></a>
                        <td><a href="{{route('edit',['id'=>$items['id']])}}"><i class="fa fa-edit text-success" aria-hidden="true"></i></td></a>
                      
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