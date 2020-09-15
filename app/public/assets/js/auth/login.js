$(document).ready(() => {
    $('#btnAccessSystem').on('click', (event) => {
        const inputs = $(':input[required]:visible');
        if (formFieldValidate(inputs)) {
            const data = $('#formLogin').serializeArray();
            $.ajax({
                url: '/Auth/authenticate',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                beforeSend: () => {
                    loadingButtonState(event.target);
                }
            }).done(function (response) {
                if (response.error) {
                    triggerAlert(response.message, 'warning', 'OK');
                    return false;
                }
                window.location.href = '/sales';
                return true;
            }).fail(function (response) {
                console.log(response)
                triggerAlert(response.responseText, 'error', 'OK');
                return false;
            }).always(function () {
                loadingButtonState(event.target, 'Entrar', false);
            });
        }

    })
});
