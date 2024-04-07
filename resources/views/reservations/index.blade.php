@extends('layout')
@section('content')

<div class="reserv" >
    <div class="flex justify-center sm:pt-0">
       <h1>الحجوزات</h1>
   </div>

   <div class="card-container">
        @if (count($reservations) > 0)
                @foreach ($reservations as $reservation)
                <div class="container">
                    <a class="card" href="{{route('reservations.show', ['reservation' => $reservation['id']])}}">
                            طلب جديد
                    </a>
                    <form action="{{route('reservations.destroy', $reservation->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="delete" type="submit" value="delete">
                    </form>
                </div>
                @endforeach 
        @else
            <div class="flex justify-center sm:pt-0">
                <h1>لا يوجد حجوزات حاليا</h1>
            </div>
        @endif
   </div>
</div>
@endsection