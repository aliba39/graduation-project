@extends('layouts.layout')
@section('title', 'تفاصيل الرسالة')
@section('content')

<div class="container my-5">
    <h1 class="text-center">تفاصيل الرسالة</h1> 

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">
                    <h3>تفاصيل الاتصال</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered"> 
                        <tbody>
                            <tr>
                                <th>الاسم</th>
                                <td>{{ $contact['name'] }}</td>
                            </tr>
                            <tr>
                                <th>رقم الهاتف</th>
                                <td>{{ $contact['phone_number'] }}</td>
                            </tr>
                            <tr>
                                <th>البريد الإلكتروني</th>
                                <td>{{ $contact['email'] }}</td> 
                            </tr>
                            <tr>
                                <th>الرسالة</th>
                                <td>{{ $contact['message'] }}</td> 
                            </tr>
                            <tr>
                                <th>التاريخ</th>
                                <td>{{ $contact['created_at'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
