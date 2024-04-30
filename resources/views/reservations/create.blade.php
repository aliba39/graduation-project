@extends('layout')
@section('content')
@section('title', 'حجز العرض')
<div class="form-container">

   <form action="{{route('reservations.store')}}" method="POST" >
      @csrf
      @method('POST')
      
      <h3>حجز تذكرة</h3>     
      <input type="text" name="first_name"  required placeholder="الاسم الشحصي">
      <input type="text" name="family_name" required placeholder="الاسم العائلي">
      <input type="number" name="phone_number" required placeholder="رقم الهاتف">
      <div>
      </div>
      <input type="text" name="address" required placeholder="العنوان">
      <input type="text" name="city" required placeholder="المدينة">
      <input type="text" name="country" required placeholder="البلد">      
      <input type="number" name="number_people" required placeholder="عدد الاشخاص">
      <div class="note">
      <label for="pet-select">اختار نوع العرض</label>
         <select id="pet-select" class="mt-2">
            <option value="">الرجاء الاختيار</option>
            <option value="ثنائي">ثنائي</option>
            <option value="ثلاثي">ثلاثي</option>
            <option value="رباعي">رباعي</option>
            
         </select>
      </div>
      {{-- <div class="note">
         <label  class="btn-file" for="passport">
            <span>جواز السفر</span> 
            <input id="passport" name="passport" type="file" class="hidden">
         </label>
      </div> --}}
      <input type="file" id="imageInput1" accept="image/*">
    

    <input type="file" id="imageInput2" accept="image/*">
    
      <input type="submit" name="submit" value="ارسال" class="form-btn">
      <div class="note">
         <p>الدفع عندما يتم قبولكم!</p>
      </div>
   </form>

</div>

@endsection

