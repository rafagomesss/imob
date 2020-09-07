$(document).ready(() => {
    $('#btnAccessSystem').on('click', () => {
        const data = $('#formLogin').serializeArray();
        $.ajax({
            url: '/Auth/authenticate',
            type: 'POST',
            dataType: 'JSON',
            data: data,
        }).done(function (response) {
            console.log(response);
            if (response.error) {
                triggerAlert('ATENÇÃO!', response.message, 'warning', 'OK');
                return false;
            }
            // triggerAlert(response.message);
        }).fail(function (response) {
            console.log(response.responseText);
            triggerAlert('ERRO!', response.responseText, 'error', 'OK');
            return false;
        }).always(function () {

        });
    })
});
