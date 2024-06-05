@extends('layouts.layout')
@section('title','صفحة الدفع')
@section('content')
    
    <div class="container my-5">
        <div class='row'>
            <h1>الدفع الالكتروني</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        العرض الخاص بك
                    </div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">العرض</th>
                                    <th style="width:10%">السعر</th>
                                    <th style="width:8%">العدد</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="{{ asset('images') }}/omra1.jpg" width="100" height="100" class="img-responsive"/>
                                            </div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $reservation->offer->title }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">${{ $reservation->offer_type }}</td>
                                    <td data-th="Quantity">{{ $reservation->number_people }}</td>
                                    <td data-th="Subtotal" class="text-right">DZD{{ $reservation->offer_type * $reservation->number_people }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <form action="/session" method="POST">
                                            @csrf
                                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> العودة للعروض</a>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type='hidden' name="total" value="{{ $reservation->offer_type }}">
                                            <input type='hidden' name="offer_name" value="{{ $reservation->offer->title }}">
                                            <input type='hidden' name="reservation_id" value="{{ $reservation->id }}">
                                            <input type='hidden' name="email" value="{{ $reservation->user->email }}">
                                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money-bill-wave"></i> الدفع</button>
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
