@extends('layout.main')
@section('content')

    <p>Нужно зарегистрироваться и войти под этим пользователем. Новый пользователь автоматически получит права manager</p>
<p>http://localhost:8876/api/tickets - постом можно создать запрос. Документацию по этому методу может быть напишу позже в SWAGGER.</p>
<p>http://localhost:8876/widget - форма для такой же заявки, но она снова идет на /api/tickets.</p>

<p>http://localhost:8876/api/tickets/statistics - список вопросов по API</p>
<p>http://localhost:8876/api/tickets/statistics?period=day/month/week - фильтрация по периаоду</p>

@endsection
