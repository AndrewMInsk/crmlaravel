@extends('layout.main')
@section('content')

<p>Страница ШУТКИ выводит в JSON список шуток.</p>
<p>Команда php artisan app:jokes-update забирает в базу 1 шутку</p>
<p>Задание 2 я не очень понял, у меня 2 варианта - либо вы имеете ввиду на самой странице https://test.amopoint-dev.ru/testzz/testlist.html сделать такой скрипт (скрипт ниже),
либо в отдельной форме на этом сайте (ссылка Форма на JS).
</p>
<p>
    Сниппет для запуска в браузере на странице https://test.amopoint-dev.ru/testzz/testlist.html
    <code class="language-javascript" style="white-space: pre-wrap;">
    $(document).ready(function() {

    function updateFieldsVisibility(selectedType) {
    var allFields = $('input[name], select[name], button[name]');

    // По каждому полю переключаем видимость
    allFields.each(function() {
    var field = $(this);
    var fieldName = field.attr('name');
    if (fieldName === 'type_val') {
    field.closest('p').show();
    return;
    }

    if (fieldName.indexOf(selectedType) !== -1) {
    field.closest('p').show();
    } else {
    field.closest('p').hide();
    }
    });
    }

    $('select[name="type_val"]').on('change', function() {
    var selectedType = $(this).val();
    updateFieldsVisibility(selectedType);
    });

    var initialType = $('select[name="type_val"]').val();
    updateFieldsVisibility(initialType);
    });
    </code>
</p>
<p>На сайте есть другие страницы, это остатки с других задач, на них не обращайте внимание</p>

{{--<a href="https://github.com/AndrewMInsk/crmlaravel?tab=readme-ov-file">Описание здесь</a>--}}
<p>Зубарев Андрей @2026</p>

<p>Telegram @asiteby</p>

<p>+375292518184</p>

<p><a href="https://a-site.by/">https://a-site.by/</a></p>

@endsection
