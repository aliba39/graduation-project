@extends('layout')
@section('content')
@section('title', 'تفاصيل الطلب')
<div class="flex justify-center items-center bg-gray-100 border-gray-200" style="flex-direction: column;">
    <div class="flex justify-center sm:pt-0" style="color: rgb(252, 175, 44);">
        <h1>تفاصيل الرسالة</h1>
    </div>

    <div class="info">
        <h3><strong>الاسم : </strong>{{ $contact['name']}}</h3>
        <h3><strong>رقم الهاتف : </strong>{{ $contact['phone_number']}}</h3>
        <h3><strong>البريد الالكتروني : </strong>{{$contact['email']}}</h3>
        <h3><strong>الرسالة  : </strong>{{ $contact['message']}}</h3>
        <h3><strong>التاريخ  : </strong>{{ $contact['created_at']}}</h3>
    </div>

@endsection