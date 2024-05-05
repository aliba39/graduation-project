@extends('layout')
@section('title', 'الحجوزات')
@section('content')
<div class="container my-5">
    <h2 class="mb-4">الحجوزات</h2>

    @if ($reservations->isEmpty())
        <div class="alert alert-info">لا يوجد طلبات جديدة.</div> <
    @else
        <table class="table table-hover"> 
            <thead>
                <tr>
                    <th>#</th>
                    <th>تاريخ الإرسال</th>
                    <th>الإجراءات</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>تم انشاء طلب حجز جديد</td>
                        <td>{{ $reservation->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <form action="{{route('reservations.edit', $reservation->id)}}" method="" style="display:inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-secondary ">تعديل</button>
                            </form>
                            <form action="{{route('reservations.show', ['reservation' => $reservation['id']])}}" method="" style="display:inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">عرض</button>
                            </form>
                            <form action="{{route('reservations.destroy', $reservation->id)}}" method="POST" style="display:inline-block">
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
