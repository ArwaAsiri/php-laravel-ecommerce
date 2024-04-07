@extends('layouts.base')
@section('content')
<h1>welcome to dashboard</h1>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="cardbody">
                    <h1 class="text-center"><i class="bi bi-receipt-cutoff text-success"></i></h1>
                    <h4 class="text-dark text-center">Invoices</h4>


                </div>
            </div>

        </div>
        

        <div class="col">
            <div class="card" action="{{route('products')}}">
                <div class="cardbody">
                
                    <h1 class="text-center"><i class="bi bi-people-fill text-dark"></i></h1>
                    <h4 class="text-dark text-center">Customers</h4>


                </div>
            </div>



        </div>

        <div class="col">


        </div>

        <div class="col">

        </div>
    </div>


</div>

@endsection