@extends('layout.main')
@section('content')
    <h1>Создать запрос.</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="response" ></div>

    <form action="{{route('tickets.store')}}" method="post" id="client-form">
        @csrf
        <div class="mb-3">
            <label for="theme" class="form-label">Тема</label>
            <input type="text" class="form-control" id="tet" name="theme" value="{{ old('theme') }}">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Запрос</label>
            <textarea type="text" class="form-control" id="tet" name="text" {{ old('text') }}></textarea>
        </div>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Имя клиента</label>
            <input type="text" class="form-control" id="tet" name="customer_name" {{ old('customer_name') }}>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="text" class="form-control" id="tet" name="phone" {{ old('phone') }}>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="tet" name="email" {{ old('email') }}>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Картинка</label>
            <input type="text" class="form-control" id="tet" name="image"  >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#client-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{route('tickets.store')}}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#response').html('<p style="color:red;">Запрос создан</p>');
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    errorMessage += errors[key][0] + '<br>';
                                }
                            }
                            $('#response').html('<p style="color:red;">' + errorMessage + '</p>');
                        } else {
                            $('#response').html('<p style="color:red;">Произошла ошибка при создании запроса.</p>');
                        }
                    }
                });
            });
        });
    </script>
@endsection


