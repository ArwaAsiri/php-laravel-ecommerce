@extends('layouts.base')

@section('content')
<div class="container">
  
<div class="card mt-5">
    <div class="card-body bg-white">
      <form action="{{route('update-product')}}" method="post">
        @csrf
       <div class="row mt-3 text-center" >
        
         <div class="col">
            <label for="prname">اسم المنتج</label>
            <input type="text" name="is" class="form-control p-1" id="prname" value="{{$products['productname']}}">
         </div>
         
       </div>
       <div class="row mt-3">
         <div class="col text-center">
            <button class="btn btn-success" type="submit">Save</button>
         </div>
       </div>
      </form>
    </div>
</div>
</div>

@endsection