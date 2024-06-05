@extends('layouts.layout')
@section('title', 'الرسائل') 
@section('content')
<div class="container my-5">
    <h2 class="mb-4">الرسائل</h2>

    @if ($contacts->isEmpty())
        <div class="alert alert-info">لا يوجد رسائل جديدة.</div>
    @else
        <table class="table table-hover"> 
            <thead>
                <tr>
                    <th>#</th>
                    <th>تاريخ الإرسال</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>رسالة جديد</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <form action="{{route('contacts.show', ['contact' => $contact['id']])}}" method="" style="display:inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">عرض</button>
                            </form>
                            <form action="{{route('contacts.destroy', $contact->id)}}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection