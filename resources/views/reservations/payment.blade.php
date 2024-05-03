@extends('layout')
@section('title','صفحة الدفع')
@section('content')
    
    <div class="container my-5">
        <div class='row'>
            <h1>الدفع الالكتروني</h1>
            <div class='col-md-12'>
                @if ($offer)
                    <div class="card">
                        <div class="card-header">
                            العرض الخاص بك
                        </div>
                        <div class="card-body">
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:50%">العرض</th>
                                        <th style="width:10%">السعر</th>
                                        <th style="width:8%">العدد</th>
                                        {{-- <th style="width:22%" class="text-center">Subtotal</th> --}}
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs">
                                                    <img src="{{ asset('images') }}/b02.jpg" width="100" height="100" class="img-responsive"/>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $offer->title }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">7</td>
                                        <td data-th="Quantity">
                                            <input type="number" value="1" class="form-control quantity cart_update" min="1" />
                                        </td>
                                        {{-- <td data-th="Subtotal" class="text-center">$6</td>--}} 
                                        <td class="actions" data-th="">
                                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> حذف</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">
                                            <strong>المجموع: $6</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">
                                            <form action="/session" method="POST">
                                                @csrf
                                                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> العودة للعروض</a>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type='hidden' name="total" value="6">
                                                <input type='hidden' name="offer_name" value="">
                                                <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> الدفع</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">لا يوجد عرض مرتبط بهذا الحجز</div> <!-- التعامل مع حالة عدم وجود عرض -->
                @endif
            </div>
        </div>
    </div>
@endsection

 
