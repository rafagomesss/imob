$(document).ready(() => {
    $('#btnAccessSystem').on('click', () => {
        const data = $('#formLogin').serializeArray();
        $.ajax({
            url: '/Auth/authenticate',
            type: 'POST',
            dataType: 'JSON',
            data: data,
        }).done(function (response) {
            if (response.error) {
                triggerAlert(response.message, 'warning', 'OK');
                return false;
            }
            triggerAlert('Usuário logado com sucesso!', 'success', 'OK');
            return true;
        }).fail(function (response) {
            console.log(response)
            triggerAlert(response.responseText, 'error', 'OK');
            return false;
        }).always(function () {

        });
    })
});
