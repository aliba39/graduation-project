@extends('layout')
@section('title', 'اتصل بنا') 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-container">
                    <h2>اتصل بنا</h2>
                    
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone_number" placeholder="رقم الهاتف" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="الرسالة" required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary btn-submit" value="اٍرسال"> 
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 



