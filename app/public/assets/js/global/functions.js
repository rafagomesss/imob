$(document).ready(() => {

    if ($('input[type="email"]').length) {
        $('input[type="email"]').change((event) => {
            $(event.target).closest('form').submit(() => { return false; });
            var sEmail = $(event.target).val();
            var emailFilter = /^.+@.+\..{2,}$/;
            var illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\]]/
            if (!(emailFilter.test(sEmail)) || sEmail.match(illegalChars)) {
                Swal.fire({
                    title: 'ATENÇÃO!',
                    text: 'Por favor, informe um email válido!',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    toast: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(event.target).val('');
                        $(event.target).focus();
                    }
                });
            }
        });
    }
});

function triggerAlert(msg = '', icon = 'success', confirmButtonText = 'OK', toast = false, time = 3000, callback = null) {
    const titleContent = {
        'error': 'Erro!',
        'warning': 'Atenção!',
        'success': 'Sucesso!',
        'info': 'Informação!',
        'question': 'Questionamento'
    };

    Swal.fire({
        title: titleContent[icon],
        text: msg,
        icon: icon,
        confirmButtonText: confirmButtonText,
        toast: toast,
        position: "center",
    }).then((event) => {
        if (event.isConfirmed) {
            callback;
        }
    });
}

function formFieldValidate(inputs) {
    let validate = true;
    $.each(inputs, function () {
        removeBorderDanger(this);
        if (this.value === '') {
            addBorderDanger(this);
            triggerAlert('Preencha os campos obrigatórios!', 'warning', 'OK', true);
            validate = false;
        }
    });
    return validate;
}

function addBorderDanger(field) {
    $(field).addClass('border-danger');
}

function removeBorderDanger(field) {
    const input = $(field);
    if (input.hasClass('border-danger')) {
        $(input).removeClass('border-danger');
    }
}

function encryptDecrypt(string, decrypt = false) {
    if (string.length) {
        if (decrypt) {
            return atob(string).slice(0, -5);
        }
        return btoa(string + '%$#@!');
    }
}

function loadingButtonState(button, html = ' Carregando...', disabled = true) {
    if ($(button).length) {
        const spanLoading = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
        $(button).html(disabled ? spanLoading + html : '' + html);
        $(button).prop('disabled', disabled);
    }
}
