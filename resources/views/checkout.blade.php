@extends('layout')
@section('content')
    
    <div class="container">
        <div class='row'>
            <h1>Laravel 10 How To Integrate Stripe Payment Gateway</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                    Laravel 10 How To Integrate Stripe Payment Gateway
                    </div>
                    <div class="card-body">
                    <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/1.jpg" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">Asus Vivobook 17 Laptop - Intel Core 10th</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">$6</td>
                            <td data-th="Quantity">
                                <input type="number" value="1" class="form-control quantity cart_update" min="1" />
                            </td>
                            <td data-th="Subtotal" class="text-center">$6</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align:right;"><h3><strong>Total $6</strong></h3></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:right;">
                                <form action="/session" method="POST">
                                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type='hidden' name="total" value="6">
                                <input type='hidden' name="product_name" value="Asus Vivobook 17 Laptop - Intel Core 10th">
                                <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
