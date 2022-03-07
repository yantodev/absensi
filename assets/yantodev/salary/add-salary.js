/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
function getSubCategory(idCategory, nbm, month, year) {
    var idCategory = idCategory;
    var nbm = nbm;
    var month = month;
    var year = year;
    $.ajax({
        type: 'GET',
        url: url + '/category/get_sub_category',
        dataType: 'json',
        data: { id: idCategory },
         beforeSend: function(e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            var inputOptions = {};
            for (var i = 0; i < response.length; i++) {
                var id = response[i].id;
                var name = response[i].name;
                inputOptions[id] = name;
            }; 
            Swal.fire({
                title: 'Select Sub Category',
                input: 'select',
                inputOptions: inputOptions,
                inputPlaceholder: 'Select Sub Category',
                showCancelButton: true,
                confirmButtonText: 'Add',
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading()
            }).then((data) => {
                $.ajax({
                    type: 'GET',
                    url: url + '/category/get_master_salary',
                    dataType: 'json',
                    data: { id: data.value },
                    beforeSend: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function (res) {
                        addSalary(res[0].id_salary_sub_category, res[0].qty, res[0].price, idCategory, nbm, month, year);
                    }
                });
            })
        },
        error: function (xhr, ajaxOptions) {
            console.log(ajaxOptions, xhr.responseText, "error"); 
        }
    })
}

function addSalary(idsubCategory,qty, price, idCategory, nbm, month, year) {
    $.ajax({
        type: 'POST',
        url: url+'/category/saveSalary',
        data: {
            idsubCategory : idsubCategory,
            idCategory: idCategory,
            qty: qty,
            price: price,
            nbm: nbm,
            month: month,
            year: year,
        },
        success: function () {
            setTimeout(function () {
                window.location.reload(1)
            }, 1000);
                Swal.fire({
                icon: "success",
                title: "Data berhasil ditambahkan!!!",
            })
        },
        error: function (xhr, ajaxOptions) {
            console.log(ajaxOptions, xhr.responseText, "error"); 
        }
    });
}