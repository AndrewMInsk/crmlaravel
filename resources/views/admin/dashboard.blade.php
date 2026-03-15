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
        <th>Действия</th>
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
            <td>
                <button class="btn btn-detail" data-ticket-id="{{$ticket->id}}">Подробнее</button>
            </td>
        </tr>
    @endforeach
</table>


<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование заявки</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="ticketForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="theme">Тема</label>
                        <input type="text" class="form-control" id="theme" name="theme" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="new">Новая</option>
                            <option value="in_work">В работе</option>
                            <option value="done">Выполнена</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customer_name">Имя клиента</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.btn-detail').on('click', function() {
            var ticketId = $(this).data('ticket-id');
            $.get('/api/tickets/' + ticketId, function(data) {
                $('#theme').val(data.theme);
                $('#text').val(data.text);
                $('#status').val(data.status);
                $('#customer_name').val(data.customer_name);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#ticketModal').modal('show');
            });
        });

        $('#ticketForm').on('submit', function(e) {
            e.preventDefault();
            var ticketId = $('.btn-detail[data-ticket-id]').data('ticket-id');
            var formData = $(this).serialize();
            $.ajax({
                url: '/api/tickets/' + ticketId,
                type: 'PUT',
                data: formData,
                success: function() {
                    $('#ticketModal').modal('hide');
                    alert('Заявка успешно обновлена!');
                    location.reload();
                },
                error: function() {
                    alert('Ошибка при обновлении заявки');
                }
            });
        });
    });
</script>
@endsection