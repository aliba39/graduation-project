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
        <h3><strong>العنوان  : </strong>{{ $reservation->offer->title }}</h3>
    </div>
    {{-- <div class="images">
        <img class="img" src="../images/{{ $reservation['birth_certificate']}}" alt="شهادة ميلاد"> 
        <img class="img" src="../images/{{ $reservation['passport']}}" alt="جواز سفر">
    </div> --}}
    <button id="downloadButton1" disabled>Download Image 1</button>
    <button id="downloadButton2" disabled>Download Image 2</button>
    <div class="flex mt-8">
        <button id="approveBtn" class="btn-sub" href="">الموافقة</button>
        <button id="rejectBtn" class="btn-sub" href="">الرفض</button>
    </div>
    <div id="contentContainer"></div>
    
</div>
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

document.getElementById('imageInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var downloadButton = document.getElementById('downloadButton');
    
    if (file && file.type.startsWith('image/')) {
        downloadButton.disabled = false;
        downloadButton.addEventListener('click', function() {
            var imageUrl = URL.createObjectURL(file);
            var a = document.createElement('a');
            a.href = imageUrl;
            a.download = 'image.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(imageUrl);
        });
    } else {
        downloadButton.disabled = true;
        alert('Please select an image file.');
    }
});
</script> --}}

@endsection