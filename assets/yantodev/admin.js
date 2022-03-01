var copyText = 'copyText';

function copyURL(id) {
    copyText.select();
        document.execCommand("copy");
        Swal.fire({         //displays a pop up with sweetalert
        icon: 'success',
        title: 'Text copied to clipboard',
        showConfirmButton: false,
        timer: 1000
    });
}

function getNameById(id) {

}