@extends('layouts.layout')
@section('title', 'تعديل عرض')
@section('container')


<div class="form-container">

   <form action="{{ route('offers.update', ['offer' => $offer->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <h3>التعديل على العرض</h3>      
      <input type="text" value="{{$offer->title}}" name="title" required placeholder="العنوان">
      <div class="hotel">
         <input type="text" value="{{$offer->hotel_1}}" name="hotel_1" placeholder="فندق المدينة">
         <input type="text" value="{{$offer->hotel_2}}" name="hotel_2" placeholder="فندق مكة">
         <input type="text" value="{{$offer->prix_12}}" name="prix_12" placeholder="الثنائي">
         <input type="text" value="{{$offer->prix_13}}" name="prix_13" placeholder="الثلاثي">
         <input type="text" value="{{$offer->prix_14}}" name="prix_14" placeholder="الرباعي">
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
      <input type="text" value="{{$offer->description}}" name="description" required placeholder="تفاصيل خفيفة">
   
      <div class="input-group mb-3">
         <input type="file" class="form-control" name="image" value="{{ $offer['image']}}" id="inputGroupFile02">
         <label class="input-group-text" for="inputGroupFile02">Upload</label>
       </div>
       
      <input type="submit" name="submit" value="تعديل" class="form-btn">
   </form>

</div>

@endsection

