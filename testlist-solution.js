// Сниппет для запуска в браузере на странице https://test.amopoint-dev.ru/testzz/testlist.html

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