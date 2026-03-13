@extends('layout.main')
@section('content')
    <h1>Create Post</h1>

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
            <label for="client" class="form-label">Клиент</label>
            <input type="text" class="form-control" id="tet" name="client" >
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Текст</label>
            <textarea type="text" class="form-control" id="tet" name="text"></textarea>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="text" class="form-control" id="tet" name="phone" >
        </div>
        <div class="mb-3">
            <label for="client_id" class="form-label">Картинка</label>
            <input type="text" class="form-control" id="tet" name="client_id" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection


