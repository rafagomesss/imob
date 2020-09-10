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
