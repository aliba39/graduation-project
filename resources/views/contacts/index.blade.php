@extends('layout')
@section('content')
<div>
    <div class="container" style="padding: 30px 0">
        <style>
            nav svg {
                height: 20px;
            }

            nav.hidden {
                displpay: block !important;
            }
        </style>
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class="page-title"> رسائل التواصل</h1>
                @if (count($contacts) > 0)
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Create At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row"><a href="{{route('contacts.show', ['contact' => $contact['id']])}}">{{$i++}}</a></th> 
                                    <td><a href="{{route('contacts.show', ['contact' => $contact['id']])}}">{{$contact->name}}</a></td>
                                    <td><a href="{{route('contacts.show', ['contact' => $contact['id']])}}">{{$contact->email}}</a></td>
                                    <td><a href="{{route('contacts.show', ['contact' => $contact['id']])}}">{{$contact->phone_number}}</a></td>
                                    <td><a href="{{route('contacts.show', ['contact' => $contact['id']])}}">{{$contact->created_at}}</a></td>                                    </tr>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>there are no contact message to display</p>
                @endif
            </div>
        </div>
    </div>
</div>    
@endsection
