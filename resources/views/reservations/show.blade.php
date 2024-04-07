@extends('layout')
@section('content')
@section('title', 'تفاصيل الطلب')
<div class="flex justify-center items-center bg-gray-100 border-gray-200" style="flex-direction: column;">
    <div class="flex justify-center sm:pt-0" style="color: rgb(252, 175, 44);">
        <h1>تفاصيل الطلب</h1>
    </div>

    <div class="info">
        <h3><strong>الاسم الشخصي : </strong>{{ $reservation['first_name']}}</h3>
        <h3><strong>الاسم العائلي : </strong>{{ $reservation['family_name']}}</h3>
        <h3><strong>رقم الهاتف : </strong>{{ $reservation['phone_number']}}</h3>
        <h3><strong>البريد الالكتروني : </strong>{{$reservation->user->email}}</h3>
        <h3><strong>العنوان  : </strong>{{ $reservation['address']}}</h3>
        <h3><strong>المدينة  : </strong>{{ $reservation['city']}}</h3>
        <h3><strong>البلد  : </strong>{{ $reservation['country']}}</h3>
        <h3><strong>عدد الاشخاص : </strong>{{ $reservation['number_people']}}</h3>
    </div>
    <div class="images">
        <img class="img" src="../images/{{ $reservation['birth_certificate']}}" alt="شهادة ميلاد"> 
        <img class="img" src="../images/{{ $reservation['passport']}}" alt="جواز سفر">
    </div>
    <div class="flex mt-8">
        <button id="approveBtn" class="btn-sub" href="">الموافقة</button>
        <button id="rejectBtn" class="btn-sub" href="">الرفض</button>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#approveBtn').click(function(){
            sendEmail('approval');
        });

        $('#rejectBtn').click(function(){
            sendEmail('rejection');
        });

        function sendEmail(type) {
            $.ajax({
                url: '/send-email',
                method: 'POST',
                data: {
                    type: type,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response){
                    alert(response.message);
                }
            });
        }
    });
</script>

@endsection