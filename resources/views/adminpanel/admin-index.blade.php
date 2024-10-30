@extends('adminpanel.adminlayout.layout')
@section('admin-content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="row">
        <!-- Total Orders -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fs-1">Total Orders</h5>
                    <p class="card-text fs-3">0</p>
                </div>
            </div>
        </div>

        <!-- Total Sales -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fs-1">Total Sales</h5>
                    <p class="card-text fs-3">0</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
