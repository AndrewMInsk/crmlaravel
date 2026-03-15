@extends('layout.main')
@section('content')
    <h1>Создать запрос. Сделано через API, что бы не нужно было использовать Postman</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Post Form -->

    <form action="{{route('tickets.store')}}" method="post">
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

@endsection


