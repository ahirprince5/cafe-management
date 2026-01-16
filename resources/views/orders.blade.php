@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        Orders
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Total (₹)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Coffee</td>
                    <td>2</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Sandwich</td>
                    <td>1</td>
                    <td>120</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
