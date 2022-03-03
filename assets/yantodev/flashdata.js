const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        icon: "success",
        title: flashdata,
        text: ""
    })
}