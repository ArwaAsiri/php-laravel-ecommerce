@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-2">
                <h1>Shopping cart</h1>
                <i class="text-dark font-weight-bold">You Picked {{count($data)}} Products</i></p>
                
            </div>
            @foreach ($data as $item)
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                <div class="mr-1"><img class="rounded" src="/assists/{{ $item->images }}" width="70"></div>
                <div class="d-flex flex-column align-items-center product-details">
                <span class="badge bg-success p-2" style="font-size: medium;">{{ $item->description }}</span>
                    <div class="d-flex flex-row product-desc">
                       
                       
                        <div class="color"><span class="text-grey">Color:</span><span class="font-weight-bold">&nbsp;{{ $item->color }}</span></div>
                    </div>
                </div>
                <card class="d-flex flex-row align-items-center qty quantity-container" >
                  
                    <input type="number" class="form-control form-control-lg text-center qty-input"  value="1">
                   
                   
</card>
                <div><h5 class="text-grey">{{ $item->price }} SAR</h5></div>
                <div class="d-flex align-items-center"><i class="fa fa-trash mb-1 text-danger"></i></div>
            </div>
            
            @endforeach
           

            <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div>
            <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded mr-2" ><h3> Total:  <h3 class="mb-2">  {{ $total}} SAR</h3></h3></div><div class="d-flex justify-content-between">
                                           
                                        </div>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div>
        </div>
        
    </div>
</div>

@endsection

@section('styles')
<style>
  
    .quantity-container {
        width: 100px; 
    }
</style>
@endsection

@section('scripts')
<script>
   
    document.addEventListener("DOMContentLoaded", function () {
      
        const quantityInputs = document.querySelectorAll('.qty-input');
        const minusButtons = document.querySelectorAll('.qty-minus');
        const plusButtons = document.querySelectorAll('.qty-plus');

     
        minusButtons.forEach(function (button, index) {
            button.addEventListener('click', function () {
              
                if (quantityInputs[index].value > 1) {
                    quantityInputs[index].value--;
                }
            });
        });

       
        plusButtons.forEach(function (button, index) {
            button.addEventListener('click', function () {
          
                quantityInputs[index].value++;
            });
        });
    });
</script>
@endsection
