/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
function deleteSalary(id) {
    console.log(id)
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: url + `/salary/delete_salary`,
                data: {
                    id: id,
                },
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
            })
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            setTimeout(function () {
                window.location.reload(1)
            }, 1000)
        }
        })
}