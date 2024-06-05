@extends('layouts.layout')
@section('title', 'اتصل بنا')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>تواصل معنا</h2>
                <form id="contactForm" action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        <div class="invalid-feedback" role="alert" id="nameError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        <div class="invalid-feedback" role="alert" id="emailError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">رقم الهاتف</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required>
                        <div class="invalid-feedback" role="alert" id="phoneError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">الرسالة</label>
                        <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                        <div class="invalid-feedback" role="alert" id="messageError"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('حدث خطأ أثناء الإرسال');
            }
            return response.json();
        })
        .then(data => {
            alert(data.success);
            form.reset();
        })
        .catch(error => {
            alert('لم يتم إرسال الرسالة. الرجاء المحاولة مرة أخرى.');
            console.error('خطأ:', error);
        });
    });

    </script>
@endsection
