const flashdata = $('.flash-data').data('flashdata');
const flashauth = $('.flash-data').data('flashauth');

if (flashdata) {
    Swal.fire({
        icon: "success",
        title: flashdata,
        text: ""
    })
}
if (flashauth) {
    Swal.fire({
        icon: "info",
        title: flashauth,
        text: ""
    })
}
