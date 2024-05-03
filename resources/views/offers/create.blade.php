@extends('layout')
@section('title', 'عرض جديد')
@section('container')

<div class="form-container">
   <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
      @csrf   
      <h3>اضافة عرض جديد</h3>     
      <input type="text" name="title" required placeholder="العنوان">
      <div class="hotel">
         <input type="text" name="hotel_1" placeholder="فندق المدينة">
         <input type="text" name="hotel_2" placeholder="فندق مكة">
         <input type="text" name="prix_12" placeholder="الثنائي">
         <input type="text" name="prix_13" placeholder="الثلاثي">
         <input type="text" name="prix_14" placeholder="الرباعي">
      </div>
      
      <div class="hotel">
         <label for="date-1" class="input-1">تاريخ الخروج</label>
            <input id="date-1" type="date" min="2024-01-01" max="2024-12-31" name="date_out" required placeholder="تارريخ الخروج">

         <label for="date-1">تاريخ الدخول</label>
            <input id="date-1" type="date" min="2024-01-01" max="2024-12-31" name="date_in" required placeholder="تاريخ الدخول">
      </div>
      
      <div class="hotel">
         <label for="date-1" class="input-1"> السكن بمكة</label>
            <input id="date-1" type="date" min="2024-01-01" max="2024-12-31" name="stay_makh" required placeholder="تارريخ الخروج">
         

         <label for="date-1"> السكن بالمدينة</label>
            <input id="date-1" type="date" min="2024-01-01" max="2024-12-31" name="stay_madina" required placeholder="تاريخ الدخول">
         
      </div>

      <input type="text" name="airport_2" required placeholder="الخطوط ">
      <input type="text" name="airport_1" required placeholder="مطار الدخول">
      <input type="text" name="description" required placeholder="تفاصيل خفيفة">
      
       <div>
         <label class="btn-file">
            <span>صورة</span>
            <input type="file" name="image" class="hidden" required >
         </label>
      </div>

      <input type="submit" name="submit" value="اضافة" class="form-btn">
      
      @if($errors->any())
         <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
            @endforeach
         </div>
      @endif

   </form>
</div>
@endsection

