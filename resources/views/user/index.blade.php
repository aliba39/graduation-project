@extends('layouts.layout')

@section('title', 'صفحتي')
@section('content')
<div class="container my-5">
    <h1 class="mb-4">لوحة التحكم</h1> 

    <div class="row"> 
        <div class="col-md-6 mb-4"> 
            <div class="card"> 
                <div class="card-body">
                    <h2 class="card-title">اشعارات الدفع</h2> 
                    <a href="{{ route('user.notifications') }}" class="btn btn-primary">عرض</a> 
                </div>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-6 mb-4"> 
            <div class="card"> 
                <div class="card-body">
                    <h2 class="card-title">حجوزاتي</h2> 
                    @if($reservations->isEmpty()) <!-- التحقق من وجود حجوزات -->
                        <p>ليس لديك أي حجوزات.</p>
                    @else
                        @foreach($reservations as $reservation) <!-- عرض جميع الحجوزات -->
                        <a href="{{ route('reservations.show', ['reservation' => $reservation->id]) }}" class="btn btn-primary mb-2">عرض الحجز</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection