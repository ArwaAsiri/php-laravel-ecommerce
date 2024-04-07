
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
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
</body>
</html>