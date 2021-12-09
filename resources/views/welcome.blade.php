<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
</head>
<body>
@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <!-- <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p> -->
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });


        function saveData(){

            console.log("working");
        }

    </script>
@endsection

        <main>
            <section>
            <div class="container-fluid">
            {!! Form::open(['method'=>'POST' , 'action'=>'App\Http\Controllers\HomeController@store','enctype'=>'multipart/form-data']) !!}
                <div class="card">
                <div class="card-header">
                   Add Recycle Fee
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-select" id="product_name" name="product_name" aria-label="Default select example">
                                    @foreach ( $productss as $product)
                                            <option value="{{$product['title']}}">{{$product['title']}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-select" id="state" name="state" aria-label="Default select example">
                                            <option value="CA">CA</option>
                                            <option value="NY">NY</option>
                            </select>
                        </div>
                  
                        <div class="col-md-3">
                            <input type="number" id="recycling_fee" name ="recycling_fee" class="form-control" name="" required>
                        </div> 

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </div> 
                
                    </div>
                 </div>
              </div>
            {!! Form::close() !!}
            </div>


            <div class="container-fluid">
                <div class="card">
                    <h5 class="card-header">Product Details</h5>
                        <div class="card-body">
                            
                        <table id="example" class="table table-striped table-borderless mt-4">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>product Name</th>
                                            <th>State</th>
                                            <th>Recycling Fee</th>
                                            <!-- <th>profile image</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product_items as $product_item)
                                            
                                      
                                        <tr>
                                            <td><b>{{$product_item->product_name}}</b></td>
                                            <td><b>{{$product_item->state}}</b></td>
                                            <td><b>${{$product_item->recycling_fee}}</b></td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-user-line"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                                    <a class="iq-bg-primary" role="button" data-toggle="modal" data-target="#exampleModal" href="#" ><i class="ri-delete-bin-line"></i></a> -->
                                                    <button type="button" class="btn btn-primary">Edit</button>
                                                    <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                                                      <a href="{{url('/', $product_item->id)}}" class="btn btn-danger" role="button">Delete</a>
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                               
                                    </tbody>

                                </table>
                            
                        </div>
                </div>
            </div>
            
            </section>
        </main>
</body>
</html>




