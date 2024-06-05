@extends('layouts.layout')

@section('title', 'نجاح الدفع')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h3>تمت عملية الدفع بنجاح</h3>
                </div>
                <div class="card-body text-center">
                    <p>شكرًا لك! تمت عملية الدفع بنجاح.</p>
                    <p>سيتم التواصل معك قريبًا بخصوص طلبك.</p>
                    <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">العودة إلى الصفحة الرئيسية</a>
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
