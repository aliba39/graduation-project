@extends('layout') 

@section('title', 'الاشعارات')
@section('content')
<div class="container my-5">
    <h2 class="mb-4">إشعارات الحجوزات</h2>

    @if ($notifications->isEmpty())
        <div class="alert alert-info">لا يوجد إشعارات جديدة.</div> <!-- تباين لعدم وجود إشعارات -->
    @else
        <table class="table table-hover"> <!-- جدول مع تنسيق Bootstrap -->
            <thead>
                <tr>
                    <th>الرسالة</th>
                    <th>تاريخ الإرسال</th>
                    <th>الإجراءات</th> <!-- عمود للإجراءات -->
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->message }}</td> <!-- رسالة الإشعار -->
                        <td>{{ $notification->created_at->format('Y-m-d H:i:s') }}</td> <!-- تاريخ الإرسال -->
                        <td>
                            <!-- زر لتحديد كمقروء -->
                            <form action="{{ route('admin.notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">تحديد كمقروء</button>
                            </form>
                            <!-- زر لحذف الإشعار -->
                            <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

