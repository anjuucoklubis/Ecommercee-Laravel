$(function () {
    $(document).on("click", ".deleteproduk", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus saja!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Produk telah dihapus.",
                    icon: "success",
                }).then(() => {
                    // Once user confirms, navigate to the delete link
                    window.location.href = link;
                });
            }
        });
    });
});


$(function () {
    $(document).on("click", ".deleteUserByAdmin", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus saja!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "User telah dihapus.",
                    icon: "success",
                }).then(() => {
                    // Once user confirms, navigate to the delete link
                    window.location.href = link;
                });
            }
        });
    });
});




$(function () {
    $(document).on("click", ".deleteKategory", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus saja!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Kategory telah dihapus.",
                    icon: "success",
                }).then(() => {
                    // Once user confirms, navigate to the delete link
                    window.location.href = link;
                });
            }
        });
    });
});



$(function () {
    $(document).on("click", ".deleteRole", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus saja!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Role telah dihapus.",
                    icon: "success",
                }).then(() => {
                    // Once user confirms, navigate to the delete link
                    window.location.href = link;
                });
            }
        });
    });
});

