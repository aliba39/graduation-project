@extends('layouts.layout') 

@section('title', 'الاشعارات')
@section('content')
<div class="container my-5">
    <h2 class="mb-4">إشعارات الحجوزات</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($reservation_notifications->isEmpty())
        <div class="alert alert-info">لا يوجد إشعارات جديدة.</div> 
    @else
        <table class="table table-hover"> 
            <thead>
                <tr>
                    <th>الرسالة</th>
                    <th>تاريخ الإرسال</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservation_notifications as $reservation_notification)
                    <tr>
                        <td>{{ $reservation_notification->message }}</td> 
                        <td>{{ $reservation_notification->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <form action="{{ route('notifications.markAsRead', $reservation_notification->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success mark-as-read">تحديد كمقروء</button>
                            </form>
                            <form action="{{ route('notifications.destroy', $reservation_notification->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-notification">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection