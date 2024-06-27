@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Available Products
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Unit Price</th>
                        <th>Sales Unit Price</th>
                    </tr>
                </thead>
                
                <tbody>
                	@foreach($products as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->category }}</td>
                        
                        @if($row->stock > '0')
                            <td>{{ $row->stock }}</td>
                        @else
                            <td>Not Available</td>
                        @endif

                        <td>{{ $row->unit_price }}</td>
                        <td>{{ $row->sales_unit_price }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection