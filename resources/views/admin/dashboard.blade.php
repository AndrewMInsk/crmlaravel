@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Админка</h1>
@stop

@section('content')
<table class="table">
    <thead>
    <tr>
        <th>Тема</th>
        <th>Вопрос</th>
        <th>Статус</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Почта</th>
    </tr>
    </thead>
    @foreach($tickets as $ticket)

        <tr>
            <td>{{$ticket->theme}}</td>
            <td>{{Str::limit($ticket->text, 100, '...')}}</td>
            <td>{{$ticket->status}}</td>
            <td>{{$ticket->getCustomer->customer_name}}</td>
            <td>{{$ticket->getCustomer->phone}}</td>
            <td>{{$ticket->getCustomer->email}}</td>
        </tr>

    @endforeach
</table>
@stop

