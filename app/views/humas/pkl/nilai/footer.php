<div class="col-md-6">
    <div class="modal-body">
        <h4 class="modal-title" id="exampleModalLabel">Aspek Non-Teknis</h4>
        <div class="form-group">
            <label for="religius">Religius</label>
            <select class="form-control" aria-label="Default select example" id="religius" name="religius" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kejujuran">Kejujuran</label>
            <select class="form-control" aria-label="Default select example" id="kejujuran" name="kejujuran" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="disiplin">Disiplin</label>
            <select class="form-control" aria-label="Default select example" id="disiplin" name="disiplin" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kerjasama">Kerja Sama</label>
            <select class="form-control" aria-label="Default select example" id="kerjasama" name="kerjasama" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="inisiatif">Inisiatif</label>
            <select class="form-control" aria-label="Default select example" id="inisiatif" name="inisiatif" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggungjawab">Tanggung Jawab</label>
            <select class="form-control" aria-label="Default select example" id="tanggungjawab" name="tanggungjawab" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kebersihan">Kebersihan</label>
            <select class="form-control" aria-label="Default select example" id="kebersihan" name="kebersihan" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kesantunan">Kesantunan</label>
            <select class="form-control" aria-label="Default select example" id="kesantunan" name="kesantunan" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mutupekerjaan">Mutu Pekerjaan</label>
            <select class="form-control" aria-label="Default select example" id="mutupekerjaan" name="mutupekerjaan" required>
                <option selected disabled>--Pilih--</option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang">Kurang</option>
            </select>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary mr-2">Tambah</button>
</div>
</form>
</div>
</div>
</div>
</div>

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