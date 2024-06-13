@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        @include('admin.message')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order</h1>
            </div>
            <div class="col-sm-6 text-right">
                
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <button type="button" onclick="window.location.href='{{ route('orders.index') }}'" class="btn btn-default btn-sm">Reset</button>
                </div>
                <div class="card-tools">
                    <form action="{{ route('orders.index') }}" method="get">
                        <div class="input-group input-group" style="width: 250px;">
                            <input  type="text" name="keyword" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">Order#</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th> first_Name</th>
                            <th> last_Name</th>
                            <th>Booking Address</th>
                            <th>Booking Phone #</th>
                            <th>Grand Total</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->first_name }}</td>
                                <td>{{ $order->last_name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->mobile }}</td>
                                <td>PKR {{ number_format($order->grand_total,2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M,Y') }}</td>
                                <td>{{ $order->booking_time ? \Carbon\Carbon::parse($order->booking_time)->format('h:i A') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Records not found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection

@section('customjs')

@endsection
