@extends('layout') 

@section('content')
<div class="container my-5">
    <h1 class="mb-4">لوحة الإدارة</h1> 

    <div class="row"> 
        <div class="col-md-6 mb-4"> 
            <div class="card">                                                                      
                <div class="card-body">
                    <h2 class="card-title">رسائل التواصل</h2> 
                    <a href="{{ route('contacts.index') }}" class="btn btn-primary">عرض رسائل التواصل</a> 
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4"> 
            <div class="card"> 
                <div class="card-body">
                    <h2 class="card-title">الحجوزات</h2> 
                    <a href="{{ route('admin.notifications') }}" class="btn btn-primary">عرض الحجوزات</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
