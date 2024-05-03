@extends('layout')
@section('title','Request-Sent') 
@section('container') 

@section('content')
<div class="alert alert-success">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <p>
        لقد تم إرسال طلبكم بنجاح، للمزيد من المعلومات المرجو مراسلتنا على البريد الالكتروني xxx@xxx.com		
    </p>
    <a class="btn btn-info" href="{{ route('offers.index') }}">العودة للعروض</a>
    {{-- <a class="btn btn-warning" href="{{route('reservations.edit', $reservation->id)}}">التعديل على عرضك</a> --}}
</div>
@endsection