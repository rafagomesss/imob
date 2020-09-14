$(document).ready(() => {
    $('#productExpiration').mask('00/00/0000');
    $('#productExpiration').datepicker();
    $('#productExpiration').datepicker('option', {
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd/mm/yy",
    });
    $('#productExpiration').datepicker($.datepicker.regional["pt-BR"]);

    $('#btnRegisterUpdateProduct').on('click', () => {
        const inputs = $(':input[required]:visible');
        if (formFieldValidate(inputs)) {
            const data = $('#formUpdateProduct').serializeArray();
            $.ajax({
                url: '/products/updateProduct',
                type: 'POST',
                dataType: 'JSON',
                data: data,
            }).done(function (response) {
                handleDoneAlerts(response);
            }).fail(function (response) {
                console.log(response)
                triggerAlert(response.responseText, 'error', 'OK');
                return false;
            }).always(function () {

            });
        }
    });
});

function handleDoneAlerts(response) {
    if (response.error && parseInt(response.code) === 23000) {
        triggerAlert('Esse código de produto já está sendo utilizado!', 'warning', 'OK');
        return false;
    } else if (response.error) {
        triggerAlert(response.message, 'warning', 'OK');
        return false;
    } else {
        Swal.fire({
            title: 'SUCESSO!',
            text: response.message,
            icon: 'success',
            confirmButtonText: 'OK',
            toast: false,
            allowEscapeKey: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                window.location.href = '/products/list';
            }
        });
        return true;
    }
}
