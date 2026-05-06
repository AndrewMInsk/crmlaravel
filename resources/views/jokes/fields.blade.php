@extends('layout.main')

@section('content')
    <h1>Форма на JavaScript</h1>
    <p>Тип &nbsp; &nbsp;
        <select name="type_val" id="type_val">
            <option value="inp1 button_1">inp1 button_1</option>
            <option value="inp3 button_2 button_4">inp3 button_2 button_4</option>
            <option value="inp7 button_3">inp7 button_3</option>
            <option value="inp1 inp3">inp1 inp3</option>
            <option value="inp2 inp4 inp6">inp2 inp4 inp6</option>
            <option value="inp5 button_1">inp5 button_1</option>
        </select>
    </p>

    <p>Поле 1<input name="inp1" type="text" /></p>
    <p>Поле 2<input name="inp2" type="text" /></p>
    <p>Поле 3<input name="inp3" type="text" /></p>
    <p>Поле 4<input name="inp4" type="text" /></p>


    <p><input name="button_1" type="button" value="Кнопка 1" /></p>
    <p><input name="button_2" type="button" value="Кнопка 2" /></p>
    <p><input name="button_3" type="button" value="Кнопка 3" /></p>
    <p><input name="button_4" type="button" value="Кнопка 4" /></p>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateFieldsVisibility(selectedValues) {
                var allFields = $('[name]');
                
                var valuesArray = selectedValues.split(' ').filter(function(value) {
                    return value.trim() !== '';
                });
                
                allFields.each(function() {
                    var field = $(this);
                    var fieldName = field.attr('name');
                    
                    if (fieldName === 'type_val') {
                        field.closest('p').show();
                        return;
                    }
                    
                    var shouldShow = valuesArray.some(function(value) {
                        return fieldName === value;
                    });
                    
                    if (shouldShow) {
                        field.closest('p').show();
                    } else {
                        field.closest('p').hide();
                    }
                });
            }
            
            $('#type_val').on('change', function() {
                var selectedValues = $(this).val();
                updateFieldsVisibility(selectedValues);
            });
            
            var initialValues = $('#type_val').val();
            updateFieldsVisibility(initialValues);
        });
    </script>
@endsection