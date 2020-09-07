function triggerAlert(title = 'Sucesso', text = '', icon = 'success', confirmButtonText = 'OK', toast = false) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: confirmButtonText,
        toast: toast
    });
}
