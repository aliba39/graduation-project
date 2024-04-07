@extends('layout')
@section('title', 'اتصل بنا') 

@section('content')
    {{-- <main class="content">
        <form class="form" method="post" action="" novalidate="novalidate">
            @csrf
            <div class="data">
                <label class="data-label" for="wpforms-1426-field_0">الإسم الكامل</label>
                <input type="text" class="data-input" name="wpforms[fields][0]" required="">
            </div>
            <div class="data">
                <label class="data-label" for="wpforms-1426-field_3">رقم الهاتف </label>
                <input type="number" class="data-input" name="wpforms[fields][3]" required="">
            </div>
            <div class="data">
                <label class="data-label" for="wpforms-1426-field_1">البريد الإلكتروني </label>
                <input type="email" class="data-input" name="wpforms[fields][1]" spellcheck="false" required="">
            </div>
            <div class="data">
                <label class="data-label" for="wpforms-1426-field_2">الرسالة </label>
                <textarea class="data-input data-input-text-area" name="wpforms[fields][2]" required="">
                </textarea>
            </div>
            <div class="btn-sub-x">
                <button type="submit" name="wpforms[submit]"  class="btn-sub" data-alt-text="جاري الإرسال..." data-submit-text="إرسال" aria-live="assertive" value="wpforms-submit">إرسال</button>
            </div>
        </form>
    </main> --}}    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-container">
                    <h2>اتصل بنا</h2>
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="الرسالة" required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-submit">إرسال الرسالة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 

