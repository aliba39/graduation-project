@extends('layouts.layout')
@section('title', 'إشعارات المستخدم')

@section('content')
<div class="container my-5">
    <h2>إشعاراتك</h2>

    <!-- عرض جميع الإشعارات -->
    @foreach(Auth::user()->notifications as $notification)
    <div class="notification-item">
        <p>{{ $notification->data['message'] }}</p>
        @if(isset($notification->data['reservation_id']))
            <a href="{{ route('user.payment', $notification->data['reservation_id']) }}" class="btn btn-info">متابعة إلى الدفع</a>
        @endif
    </div>
    @endforeach
</div>
@endsection
