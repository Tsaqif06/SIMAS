<script>
    $(function() {
        $('.tombolTambahDatanilaipkl').on('click', function() {
            $('#exampleModalLabel').html('Tambah Data')
            $('#modalnilai button[type=submit]').html('Tambah Data');
            $("#modalnilai form").attr("action",
                `http://localhost/SIMAS/public/pkl/tambahDataNilai&kelas=<?= $_GET['kelas'] ?>`
            );

            if ($("#modalnilai").hasClass("edit")) {
                $('#id').val('');
                $('#nis').val('');
                $('#namasiswa').val('');
                $('#jeniskelamin').val('');
                $('#namaindustri').val('');
            }

            $("#modalnilai").removeClass("edit")
        });

        $(".tombolUbahDatanilaipkl").click(function() {
            $("#modalnilai").addClass("edit");
            $("#exampleModalLabel").html("Ubah Data");
            $("#modalnilai button[type=submit]").html("Ubah Data");
            $("#modalnilai form").attr("action",
                `http://localhost/SIMAS/public/pkl/ubahDataNilai&kelas=<?= $_GET['kelas'] ?>`
            );

            const id = $(this).data("id");
            console.log(id);

            $.ajax({
                    url: `http://localhost/SIMAS/public/pkl/getUbahNilai`,
                    data: {
                        id: id
                    },
                    method: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        for (let key of Object.keys(data)) {
                            if (key == "foto") {
                                continue;
                            }
                            $(`#${key}`).val(data[key]);
                        }
                    },
                }),
                $.ajax({
                    url: `http://localhost/SIMAS/public/pkl/getUbahAspek`,
                    data: {
                        id: id
                    },
                    method: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        const nilaiAspek = data.reduce((acc, item) => {
                            if (!acc[item.nama_aspek]) {
                                acc[item.nama_aspek] = [];
                            }
                            acc[item.nama_aspek].push(item.nilai);
                            return acc;
                        }, {});
                        console.log(nilaiAspek);
                        for (let key of Object.keys(nilaiAspek)) {
                            $(`#${key}`).val(nilaiAspek[key]);
                        }
                    },
                })
        })
    });
</script>