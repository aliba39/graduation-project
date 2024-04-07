@extends('layout')
@section('title', 'تعديل عرض')
@section('container')

<div class="form-container">

   <form action="{{route('offers.update', ['offer' => $offer->id])}}" method="POST" >
      @csrf
      @method('PUT')

      <h3>التعديل على العرض</h3>     
      <input type="text" value="{{$offer->title}}" name="title" required placeholder="العنوان">
      <div class="hotel">
         <input type="text" value="{{$offer->hotel_1}}" name="hotel_1" placeholder=" اسم الفندق الاول">
         <input type="text" value="{{$offer->prix_12}}" name="prix_12" placeholder="الثنائي">
         <input type="text" value="{{$offer->prix_13}}" name="prix_13" placeholder="الثلاثي">
         <input type="text" value="{{$offer->prix_14}}" name="prix_14" placeholder="الرباعي">
      </div>
      <div class="hotel">
         <input type="text" value="{{$offer->hotel_2}}" name="hotel_2" placeholder="اسم الفندق الثاني">
         <input type="text" value="{{$offer->prix_22}}" name="prix_22" placeholder="الثنائي">
         <input type="text" value="{{$offer->prix_23}}" name="prix_23" placeholder="الثلاثي">
         <input type="text" value="{{$offer->prix_24}}" name="prix_24" placeholder="الرباعي">
      </div>
      <div class="hotel">
         <input type="text" value="{{$offer->hotel_3}}" name="hotel_3" placeholder="اسم الفندق الثالث">
         <input type="text" value="{{$offer->prix_32}}" name="prix_32" placeholder="الثنائي">
         <input type="text" value="{{$offer->prix_33}}"  name="prix_33" placeholder="الثلاثي">
         <input type="text" value="{{$offer->prix_34}}" name="prix_34" placeholder="الرباعي">
      </div>

      <div class="hotel">
         <label for="date-1"  class="input-1">تاريخ الخروج</label>
            <input id="date-1" type="date" value="{{$offer->date_out}}" min="2024-01-01" max="2024-12-31" name="date_out" required placeholder="تارريخ الخروج">

         <label for="date-1">تاريخ الدخول</label>
            <input id="date-1" type="date" value="{{$offer->date_in}}" min="2024-01-01" max="2024-12-31" name="date_in" required placeholder="تاريخ الدخول">
      </div>
      
      <div class="hotel">
         <label for="date-1" class="input-1"> السكن بمكة</label>
            <input id="date-1" type="date" value="{{$offer->stay_makh}}" min="2024-01-01" max="2024-12-31" name="stay_makh" required placeholder="تارريخ الخروج">
         

         <label for="date-1"> السكن بالمدينة</label>
            <input id="date-1" type="date" value="{{$offer->stay_madina}}" min="2024-01-01" max="2024-12-31" name="stay_madina" required placeholder="تاريخ الدخول">
         
      </div>

      <input type="text" value="{{$offer->airport_2}}" name="airport_2" required placeholder="الخطوط ">
      <input type="text" value="{{$offer->airport_1}}" name="airport_1" required placeholder="مطار الدخول">
      <input type="text" value="{{$offer->discription}}" name="discription" required placeholder="تفاصيل خفيفة">
      {{-- <div>
         <label class="btn-file">
            <span>صورة</span>
            <input type="file" name="image" class="hidden" required >
         </label>
      </div>  --}}
      <input type="submit" name="submit" value="تعديل" class="form-btn">
   </form>

</div>

@endsection

