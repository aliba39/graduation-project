@extends('layout')
@section('content')
@section('title', 'حجز العرض')
<div class="form-container">

   <form action="{{route('reservations.store')}}" method="POST" enctype="multipart/form-data" >
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
      <input type="hidden" name="offer_id" value="{{ $offer_id }}"> 
      <div class="mb-3">
         <label for="offer_type">اختار نوع العرض</label>
         <select name="offer_type" id="offer_type" class="form-control">
             <option value="">الرجاء الاختيار</option>
             <option value="{{ $offer->prix_12 }}">ثنائي</option>
             <option value="{{ $offer->prix_13 }}">ثلاثي</option>
             <option value="{{ $offer->prix_14 }}">رباعي</option>
         </select>
     </div>
      <div>
         <label for="photo">Upload passport:</label>
         <input type="file" name="passport" >
      </div>
      <div>
         <label for="photo">Upload birth_certificate:</label>
         <input type="file" name="birth_certificate" >
      </div>
        
      <input type="submit" name="submit" value="ارسال" class="form-btn">
      <div class="note">
         <p>الدفع عندما يتم قبولكم!</p>
      </div>
   </form>

</div>

@endsection

