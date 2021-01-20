//sweet alert
const flashdata = $(".flash-data").data("flashdata");

if (flashdata) {
    Swal.fire(flashdata, "Klik OK untuk tutup!", "success");
}

const flasherror = $(".flash-error").data("flasherror");

if (flasherror) {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: flasherror,
    });
}

// del-btn sweet alert
$(".del-btn").on("click", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");

    Swal.fire({
        title: "Apakah kamu yakin untuk menghapus data?",
        text: "Kamu tidak dapat membatalkan aksi ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, hapus!",
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

// toast
const toast = $('.toast').data('toast');

if (toast) {
    toastr.success(toast);
}