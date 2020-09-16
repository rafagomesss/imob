$(document).ready(() => {
    $('#btnUserRegister').on('click', () => {
        const inputs = $(':input[required]:visible');
        if (formFieldValidate(inputs) && verifyPasswordsFieldsValues()) {
            const data = $('#frmRegister').serializeArray();
            $.ajax({
                url: '/Auth/registerUser',
                type: 'POST',
                dataType: 'JSON',
                data: data,
            }).done((response) => {
                handleDoneAlerts(response);
            }).fail((response) => {
                triggerAlert(response.responseText, 'error', 'OK');
                return false;
            }).always(() => { });
        }
    });
});

function handleDoneAlerts(response) {
    if (response.error && parseInt(response.code) === 23000) {
        triggerAlert('Usuário já cadastrado!', 'warning', 'OK');
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
                window.location.href = '/auth/login';
            }
        });
        return true;
    }
}

function verifyPasswordsFieldsValues() {
    const password = $('#password');
    const passwordConfirmation = $('#passwordConfirmation');
    removeBorderDanger(password);
    removeBorderDanger(passwordConfirmation);
    if (!password.val().length || password.val() == '') {
        addBorderDanger(password);
        triggerAlert('O campo "' + $("label[for='" + password.attr('id') + "']").text().slice(0, -1) + '" deve ser prenchido!', 'warning', 'OK');
        return false;
    }
    if (!passwordConfirmation.val().length || passwordConfirmation.val() == '') {
        addBorderDanger(passwordConfirmation);
        triggerAlert('O campo "' + $("label[for='" + passwordConfirmation.attr('id') + "']").text().slice(0, -1) + '" deve ser prenchido!', 'warning', 'OK');
        return false;
    }
    if (password.val() != passwordConfirmation.val()) {
        addBorderDanger(password);
        addBorderDanger(passwordConfirmation);
        triggerAlert('Os valores de senha e confirmação de senha devem ser idênticos!', 'warning', 'OK');
        return false;
    }
    return true;
}

