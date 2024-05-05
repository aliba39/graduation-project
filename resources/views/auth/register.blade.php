@extends('layout')

@section('title', 'اٍنشاء حساب جديد')
@section('content')

</head>
<body style="background-color: #f8f9fa;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="auth-container">
                <h3>إنشاء حساب جديد</h3>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="الاسم" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="text-danger mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="text-danger mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="text-danger mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="تأكيد كلمة المرور" required autocomplete="new-password">
                    </div>

                    <div class="form-group text-center">
                        <button id="liveAlertBtn" type="submit" class="btn btn-primary btn-auth">تسجيل</button>
                    </div>
                    </form>
                    <div class="text-center">
                        <a class="btn btn-link" href="{{ route('login') }}">
                            لديك حساب بالفعل؟
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>        
@endsection
