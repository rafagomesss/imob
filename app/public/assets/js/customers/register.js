$(document).ready(() => {
    $('#customerDateBirth').mask('00/00/0000');
    $('#customerDateBirth').datepicker();
    $('#customerDateBirth').datepicker('option', {
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd/mm/yy",
    });
    $('#customerDateBirth').datepicker($.datepicker.regional["pt-BR"]);
    $('#customerCpf').mask('000.000.000-00');
    $('#customerEmail').mask("A", {
        translation: {
            "A": { pattern: /[\w@\-.+]/, recursive: true }
        }
    });

    $('#btnRegisterUpdateProduct').on('click', () => {
        const inputs = $(':input[required]:visible');
        if (formFieldValidate(inputs)) {
            const data = $('#formRegisterCustomer').serializeArray();
            $.ajax({
                url: '/customers/registerCustomer',
                type: 'POST',
                dataType: 'JSON',
                data: data,
            }).done(function (response) {
                handleDoneAlerts(response);
            }).fail(function (response) {
                triggerAlert(response.responseText, 'error', 'OK');
                return false;
            }).always(function () {

            });
        }
    });
});

function handleDoneAlerts(response) {
    if (response.error && parseInt(response.code) === 23000) {
        triggerAlert('Esse cliente já existe!', 'warning', 'OK');
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
                window.location.href = '/customers/list';
            }
        });
        return true;
    }
}

