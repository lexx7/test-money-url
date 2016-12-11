/**
 * Created by lex on 09.12.2016.
 */
$(function () {
    $('#url').focus();

    $('#view-button').on('click', function () {
        loadUrl($('#url').val());
        return false;
    });

    $('#url-form').on('submit', function () {
        loadUrl($('#url').val());
        return false;
    });
});

function loadUrl(url) {

    var response = '#result';
    $('#urlModal').modal('show');

    $(response).html('Загрузка...');

    $.ajax({
        method: 'GET',
        url: url,
        success: function (result) {
            $(response).html(result);
        },
        error: function () {
            $(response).html('Что-то видимо пошло не так. Нельзя отобразить заданную Вами страницу.');
        }
    });
}