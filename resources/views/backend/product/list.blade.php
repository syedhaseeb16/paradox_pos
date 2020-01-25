@extends('backend.layouts.master')
@section('title')
    Product Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Product Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 120px;">
                            <div class="input-group">
                                <a href="{{route('product.create')}}" class="btn btn-success">Create Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Listing Product</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>stock</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Worth on buying</th>
                                    <th>status</th>
                                    <th>created_by</th>
                                    <th>modified_by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; $total_store_worth_on_buying=0; $total_store_worth_on_selling=0;?>
                                @foreach($product as $pc)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td>{{$pc->n}} </td>
                                        <td>{{$pc->name}} </td>
                                        <td>{{$pc->code}} </td>
                                        <td> {{$pc->quantity}}</td>
                                        <td> {{$pc->stock}}</td>
                                        <td> {{$pc->b_price}}</td>
                                        <td> {{$pc->price}}</td>
                                        <td> {{$pc->b_price * $pc->stock}}</td>
                                        <?php 
                                            $total_store_worth_on_buying=$total_store_worth_on_buying+($pc->b_price * $pc->stock);
                                            $total_store_worth_on_selling=$total_store_worth_on_selling+($pc->price * $pc->stock);
                                        ?>

                                        <td>
                                            @if($pc->status == 1)
                                                <span class="label label-success"> Active </span>
                                            @else
                                                <span class="label label-danger">DeActive</span>
                                            @endif
                                        </td>
                                        <td> {{$pc->created_by}}</td>
                                        <td> {{$pc->modified_by}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{route('product.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{route('product.delete' ,$pc->id)}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field()}}
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')" ><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{route('stock.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-plus"></i> Stock Update</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br><br>
                        <div ><h3 class="alert alert-success">Net Worth of store on Buying:{{$total_store_worth_on_buying}}</div></h3>
                        <h3 class="alert alert-success">Net Expected profit:{{$total_store_worth_on_selling-$total_store_worth_on_buying}}</div></h3>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categorytable').DataTable();
        } );
    </script>
@endsection