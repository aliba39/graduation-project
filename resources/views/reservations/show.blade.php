@extends('layout')
@section('content')
@section('title', 'تفاصيل الطلب')
<div class="container mt-5">
    <h2>تفاصيل الحجز</h2> 

    <table class="table table-bordered"> 
        <tbody>
            <tr>
                <th>الاسم الأول</th>
                <td>{{ $reservation->first_name }}</td>
            </tr>
            <tr>
                <th>الاسم العائلي</th>
                <td>{{ $reservation->family_name }}</td>
            </tr>
            <tr>
                <th>رقم الهاتف</th>
                <td>{{ $reservation->phone_number }}</td>
            </tr>
            <tr>
                <th>المدينة</th>
                <td>{{ $reservation->city }}</td>
            </tr>
            <tr>
                <th>البريد الالكتروني</th>
                <td>{{ $reservation->user->email }}</td>
            </tr>
            <tr>
                <th>المدينة</th>
                <td>{{ $reservation->city }}</td>
            </tr>
            <tr>
                <th>البلد</th>
                <td>{{ $reservation->country }}</td>
            </tr>
            <tr>
                <th>عدد الأشخاص</th>
                <td>{{ $reservation->number_people }}</td>
            </tr>
            <tr>
                <th>شهادة الميلاد</th>
                <td>
                    @if($reservation->birth_certificate)
                        <a class="btn btn-secondary" href="{{ Storage::url($reservation->birth_certificate) }}" target="_blank">عرض</a> 
                    @else
                        لم يتم رفع شهادة ميلاد
                    @endif
                </td>
            </tr>
            <tr>
                <th>جواز السفر</th>
                <td>
                    @if($reservation->passport)
                        <a class="btn btn-secondary" href="{{ Storage::url($reservation->passport) }}" target="_blank">عرض</a>  
                    @else
                        لم يتم رفع جواز سفر
                    @endif
                </td>
            </tr>
            <tr>
                <th>تاريخ الإنشاء</th>
                <td>{{ $reservation->created_at->format('Y-m-d H:i:s') }}</td> 
            </tr>
        </tbody>
    </table>
    <div class="flex justify-center ">
        <div class="my-4">
            @if (Auth::user()->utype === 'ADM')
            <a href="{{ route('reservations.approve', $reservation->id) }}" class="btn btn-success">الموافقة</a>
            <a href="{{ route('reservations.reject', $reservation->id) }}" class="btn btn-danger">الرفض</a>
            @else
                <a class="btn btn-secondary" href="{{route('reservations.edit', $reservation->id)}}">تعديل</a>
            @endif
        </div>
    </div>
</div>
@if ($reservation->offer) <!-- تحقق من وجود علاقة -->
    <h3>تفاصيل العرض</h3>
    <p>عنوان العرض: {{ $reservation->offer->title }}</p>
    <p>سعر العرض 12: {{ $reservation->offer->prix_12 }}</p>
    <p>سعر العرض 13: {{ $reservation->offer->prix_13 }}</p>
    <p>سعر العرض 14: {{ $reservation->offer->prix_14 }}</p>
    <!-- معلومات أخرى من العرض -->
@else
    <p>لا يوجد عرض مرتبط بهذا الحجز</p>
@endif


@endsection