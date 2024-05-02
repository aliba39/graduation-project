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
                <th>العنوان</th>
                <td>{{ $reservation->address }}</td>
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
        <div class="mt-8">
            <button id="approveBtn" type="button" class="btn btn-secondary" href="">الموافقة</button>
            <button id="rejectBtn" type="button" class="btn btn-secondary" href="">الرفض</button>
        </div>
        <div id="contentContainer"></div>
    </div>
</div>
@if ($reservation->offer) <!-- تحقق من وجود علاقة -->
    <h3>تفاصيل العرض</h3>
    <p>عنوان العرض: {{ $reservation->offer->title }}</p>
    <p>سعر العرض 12: {{ $reservation->offer->prix_12 }}</p>
    <p>سعر العرض 13: {{ $reservation->offer->prix_13 }}</p>
    <!-- معلومات أخرى من العرض -->
@else
    <p>لا يوجد عرض مرتبط بهذا الحجز</p>
@endif


{{-- <script>
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
</script> --}}
{{-- <script>

document.getElementById('approveBtn').addEventListener('click', function() {
    // Create a new page content
    var pageContent = `
        <h1>Welcome to My Page</h1>
        <p>This is some content of the page...</p>
        <p>Feel free to add any content you like!</p>
    `;

    // Get the content container
    var contentContainer = document.getElementById('contentContainer');

    // Replace the content with the new page content
    contentContainer.innerHTML = pageContent;
});

document.getElementById('rejectBtn').addEventListener('click', function() {
    // Create a new page content
    var pageContent = `
        <h1>Welcome to My Page 2</h1>
        <p>This is some content of the page...</p>
        <p>Feel free to add any content you like!</p>
    `;

    // Get the content container
    var contentContainer = document.getElementById('contentContainer');

    // Replace the content with the new page content
    contentContainer.innerHTML = pageContent;
});

</script> --}}

@endsection