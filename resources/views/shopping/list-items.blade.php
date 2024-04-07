@extends('layouts.app')

@section('content')

  
   <div class="container">
     <div class="row">
        <div class="col">
          
                @foreach($data as $items)
                <div class="card mt-2">
                    <div class="row mt-2">
                        <div class="col-sm-3">
                         <img src="/assists\{{$items->images}}" width="250" height="200">
                        </div>
                        <div class="col-sm-6">
                            <h4 class="alert alert-success">{{$items->productname}}</h4>
                            <ul class="list-unstyled">
                                <li class="badge bg-danger p-2" style="font-size: medium;">{{$items->description}}</li>
                                <li class="p-2"> <h4>{{$items->color}}</h4> </li>
                                <li class="p-2"> <small>Address Jeddah Khaled ibn Alawalid St</small> </li>
                            </ul>
                        </div>
                        <div class="col-sm-3"> 
                            <ul class="list-unstyled p-2">
                                <li class="badge bg-success " style="font-size: medium;"> {{$items->price}} SAR</li>
                                <li class=""> <span>Tax: {{$items->tax}} SAR</span> </li>
                                <li class=""> <small>Total: {{$items->total}} SAR </small> </li>
                                <li class=""> <small><p>Discount: <del>{{$items->discount}} SAR </del></p> </small> </li>
                                <li class=""> <small>Net: {{$items->net}} SAR </small> </li>
                               
                            </ul>
                            <div class="row">
                                <div class="col">
                                    <a href="{{route('show-items-details',['id'=>$items->id])}}" class="btn btn-primary">Show Details >></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            
        </div>
     </div>
   </div>

@endsection