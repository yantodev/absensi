/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
function updateCategory(idCategory) {
    console.log(`${ idCategory }`);
    Swal.fire({
        title: 'Name Category',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Update',
        showLoaderOnConfirm: true,
        preConfirm: (name) => {
            $.ajax({
                type: 'POST',
                url: url + `/salary/edit_category`,
                data: {
                    id: idCategory,
                    name: name,
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
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: `${result.value.login}'s avatar`,
                imageUrl: result.value.avatar_url
            })
        }
    })
}