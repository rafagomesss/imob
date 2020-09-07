$(document).ready(() => {
    $('#btnAccessSystem').on('click', () => {
        const data = $('#formLogin').serializeArray();
        triggerAlert();
        $.ajax({
            url: '/Auth/authenticate',
            type: 'POST',
            dataType: 'JSON',
            data: data,
        }).done(function (response) {
            console.log('done');
            console.log(response);

        }).fail(function (response) {
            console.log('fail');
            console.log(response.responseText);
        }).always(function () {

        });
    })
});
