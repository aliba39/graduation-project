@extends('layouts.layout') 
@section('title', 'تم الحجز بنجاح') 
@section('content')

<div class="container my-5"> 
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card text-center">
                <div class="card-header bg-success text-white"> 
                    <h2>حجزك تم بنجاح!</h2> 
                </div>
                <div class="card-body"> 
                    <p>شكرًا على حجزك معنا. تم تأكيد حجزك بنجاح.</p>
                    <p>سيتواصل معك فريق الدعم قريبًا بمزيد من التفاصيل.</p> 
                    <a href="{{ url('/') }}" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        window.location.href = "{{ route('home.index') }}";
    }, 5000); 
</script>
@endsection
