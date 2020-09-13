$(document).ready(() => {
    $('#btnAccessSystem').on('click', () => {
        const inputs = $(':input[required]:visible');
        if (formFieldValidate(inputs)) {
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
                window.location.href = '/sales';
                return true;
            }).fail(function (response) {
                console.log(response)
                triggerAlert(response.responseText, 'error', 'OK');
                return false;
            }).always(function () {

            });
        }

    })
});
