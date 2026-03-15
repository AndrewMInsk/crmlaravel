@extends('layout.main')
@section('content')

    Нужно зарегистрироваться и войти под этим пользователем. Новый пользователь автоматически получит права manager

    http://localhost:8876/api/tickets - постом можно создать запрос. Документацию по этому методу может быть напишу позже в SWAGGER.
    http://localhost:8876/api/tickets/statistics - список вопросов по API
    http://localhost:8876/api/tickets/statistics?start_date=2023-01-01&end_date=2027-01-31 - фильтрация по дате

@endsection
