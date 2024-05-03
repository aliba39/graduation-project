@extends('layout')
@section('content')
@section('title', 'حجز العرض')
<div class="form-container">

   <form action="{{route('reservations.update', ['reservation' => $reservation->id])}}" method="PUT" enctype="multipart/form-data" >
      @csrf
      @method('PUT')
      
      <h3>حجز تذكرة</h3>     
      <input value="{{$reservation->first_name}}" type="text" name="first_name"  required placeholder="الاسم الشحصي">
      <input value="{{$reservation->family_name}}" type="text" name="family_name" required placeholder="الاسم العائلي">
      <input value="{{$reservation->phone_number}}" type="number" name="phone_number" required placeholder="رقم الهاتف">
      <div>
      </div>
      <input value="{{$reservation->address}}" type="text" name="address" required placeholder="العنوان">
      <input value="{{$reservation->city}}" type="text" name="city" required placeholder="المدينة">
      <input value="{{$reservation->country}}" type="text" name="country" required placeholder="البلد">      
      <input value="{{$reservation->number_people}}" type="number" name="number_people" required placeholder="عدد الاشخاص">
      <div class="note">
      <label for="pet-select">اختار نوع العرض</label>
         <select id="pet-select" class="mt-2">
            <option value="">الرجاء الاختيار</option>
            <option value="ثنائي">ثنائي</option>
            <option value="ثلاثي">ثلاثي</option>
            <option value="رباعي">رباعي</option>
            
         </select>
      </div>
      <div>
         <label for="photo">Upload passport:</label>
         <input value="{{$reservation->passport}}" type="file" name="passport">
      </div>
      <div>
         <label for="photo">Upload birth_certificate:</label>
         <input value="{{$reservation->birth_certificate}}" type="file" name="birth_certificate" >
      </div>
        
      <input type="submit" name="submit" value="ارسال" class="form-btn">
      <div class="note">
         <p>الدفع عندما يتم قبولكم!</p>
      </div>
   </form>

</div>

@endsection

