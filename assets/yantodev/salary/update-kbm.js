function updateQtyKbm(id,qty) {
    console.log(id)
    console.log(qty)
     Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, sync it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: url + `/salary/update_salary_qty`,
                data: {
                    id: id,
                    qty: qty
                },
                dataType: 'json',
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                }
            })
            Swal.fire(
            'Updated!',
            'Data berhasil di synchronize...',
            'success'
            )
            setTimeout(function () {
                window.location.reload(1)
            }, 1000)
        }
        })
}