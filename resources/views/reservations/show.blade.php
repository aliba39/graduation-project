@extends('layouts.layout')
@section('title', 'تفاصيل الطلب')
@section('content')

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
                        <a class="btn btn-secondary" href="{{ Storage::url($reservation->birth_certificate) }}" download>تحميل</a>
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
                        <a class="btn btn-secondary" href="{{ Storage::url($reservation->birth_certificate) }}" download>تحميل</a>
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
            @if(Auth::user()->utype === 'ADM')
                <div class="mt-4">
                    <button id="approve-btn" class="btn btn-success">الموافقة</button>
                    <button id="reject-btn" class="btn btn-danger">الرفض</button> 
                </div>
            @else
                <a class="btn btn-secondary" href="{{route('reservations.edit', $reservation->id)}}">تعديل</a>
                <button
                    class="btn btn-success"
                    id="pay-btn"
                    onclick="
                        var approved = {{ json_encode($reservation->approved) }};
                        if (!approved) {
                            alert('لا يمكنك الآن الدفع حتى تتم الموافقة على الحجز.');
                            return false;
                        }
                        window.location.href = '{{ route('reservations.paymentPage', ['reservation_id' => $reservation->id]) }}';
                    "
                >
                    الدفع
                </button>

            @endif
        </div> 
    </div>
</div>

<script>
    document.getElementById('approve-btn').addEventListener('click', function() {
        if (confirm('هل أنت متأكد من الموافقة على هذا الحجز؟')) {
            fetch("{{ route('reservations.approve', $reservation->id) }}", {
                method: 'POST', 
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                },
            })
            .then(response => {
                if (response.ok) {
                    alert('تمت الموافقة على الحجز');
                    location.reload(); 
                } else {
                    throw new Error('خطأ أثناء الموافقة على الحجز');
                }
            })
        }
    }); 


    document.getElementById('reject-btn').addEventListener('click', function() {
        if (confirm('هل أنت متأكد من رفض هذا الحجز؟')) {
            fetch("{{ route('reservations.reject', $reservation->id) }}", {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('تم رفض الحجز');
                    window.location.href = "{{ route('reservations.index') }}"; 
                }
            });
        }
    });
</script>

@endsection 