@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        Dashboard
    </div>
    <div class="card-body">
        <h5>Welcome to Cafe Management System ☕</h5>
        <p>Manage menu items, customer orders, and billing easily.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-success">
                    Total Menu Items: <strong>10</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-warning">
                    Pending Orders: <strong>5</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-info">
                    Today's Sales: <strong>₹2500</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
