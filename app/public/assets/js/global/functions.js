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
