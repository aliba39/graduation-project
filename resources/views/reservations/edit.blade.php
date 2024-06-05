@extends('layouts.layout')
@section('title', 'تعديل الحجز')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل الحجز</div>
                <div class="card-body">
                    <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">الاسم الشخصي</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $reservation->first_name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="family_name" class="col-md-4 col-form-label text-md-right">الاسم العائلي</label>
                            <div class="col-md-6">
                                <input id="family_name" type="text" class="form-control" name="family_name" value="{{ $reservation->family_name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">رقم الهاتف</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control" name="phone_number" value="{{ $reservation->phone_number }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">العنوان</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $reservation->address }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">المدينة</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $reservation->city }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">البلد</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ $reservation->country }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="offer_type" class="col-md-4 col-form-label text-md-right">اختار نوع العرض</label>
                            <div class="col-md-6">
                                <select name="offer_type" id="offer_type" class="form-control" required>
                                    <option value="">الرجاء الاختيار</option>
                                    <option value="{{ $offer->prix_12 }}" {{ $reservation->offer_type == $offer->prix_12 ? 'selected' : '' }}>ثنائي</option>
                                    <option value="{{ $offer->prix_13 }}" {{ $reservation->offer_type == $offer->prix_13 ? 'selected' : '' }}>ثلاثي</option>
                                    <option value="{{ $offer->prix_14 }}" {{ $reservation->offer_type == $offer->prix_14 ? 'selected' : '' }}>رباعي</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_people" class="col-md-4 col-form-label text-md-right">عدد الأشخاص</label>
                            <div class="col-md-6">
                                <input id="number_people" type="number" class="form-control" name="number_people" value="{{ $reservation->number_people }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passport" class="col-md-4 col-form-label text-md-right">Upload passport:</label>
                            <div class="col-md-6">
                                <input type="file" name="passport">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_certificate" class="col-md-4 col-form-label text-md-right">Upload birth_certificate:</label>
                            <div class="col-md-6">
                                <input type="file" name="birth_certificate">
                            </div>
                        </div>

                        <input type="hidden" name="offer_id" value="{{ $reservation->offer_id }}">

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
