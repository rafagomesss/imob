$(document).ready(() => {
    $('#btnUserRegister').on('click', () => {
        const data = $('#frmRegister').serializeArray();
        $.ajax({
            url: '/Auth/registerUser',
            type: 'POST',
            dataType: 'JSON',
            data: data,
        }).done((response) => {
            handleDoneAlerts(response);

        }).fail((response) => {
            console.log(response.responseText);
            triggerAlert(response.responseText, 'error', 'OK');
            return false;
        }).always(() => { });
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
            title: 'ATENÇÃO!',
            text: response.message,
            icon: 'success',
            confirmButtonText: 'OK',
            toast: false,
            allowEscapeKey: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                window.location.href = '/home';
            }
        });
        return true;
    }
}
