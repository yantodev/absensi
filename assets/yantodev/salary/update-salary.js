/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
function updateSalary(title,id, qty, price) {
    console.log('updateSalary', id, qty, price)
    Swal.fire({
        title: `Update ${title}`,
        html: `
        <div>
            <input type="hidden" id="id" class="swal2-input" placeholder="id" value="${id}">
            QTY<input type="number" id="qty" class="swal2-input" placeholder="qty" value="${qty}">
            PRICE<input type="number" id="price" class="swal2-input" placeholder="price" value="${price}">
        </div>
        `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Update',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            const id = Swal.getPopup().querySelector('#id').value
            const qty = Swal.getPopup().querySelector('#qty').value
            const price = Swal.getPopup().querySelector('#price').value
            console.log(id)
            $.ajax({
                type: 'POST',
                url: url + `/salary/update_salary`,
                data: {
                    id: id,
                    qty: qty,
                    price: price
                },
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then(() => {
                Swal.fire({
                icon: "success",
                title: "Data berhasil ditambahkan!!!",
                })
        setTimeout(function () {
                window.location.reload(1)
            }, 1000);
    })
}