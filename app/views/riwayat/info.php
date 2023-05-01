<!--info tabel-->
<div id="infotabel" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Selengkapnya</h4>
            </div>
            <div class="modal-body">
                <div style="text-align: center;">
                    <?php if (isset($data['riwayat'][0]['row']["foto"])) : ?>
                        <?php if (file_exists("images/datafoto/{$data['riwayat'][0]['row']["foto"]}")) : ?>
                            <p><img src="images/datafoto/<?= $data['riwayat'][0]['row']["foto"]; ?>" class="data-img" width="150px" style="border-radius: 100px; -moz-border-radius: 100px;"></p>
                        <?php else : ?>
                            <p><img src="images/datafoto/pp.png" class="data-img" width="150px" style="border-radius: 100px; -moz-border-radius: 100px;"></p>
                        <?php endif; ?>
                    <?php else : ?>
                        <p><img src="images/datafoto/pp.png" class="data-img" width="150px" style="border-radius: 100px; -moz-border-radius: 100px;"></p>
                    <?php endif; ?>
                </div>
                <ul>
                    <?php foreach ($data['riwayat'][0]['row'] as $key => $val) : ?>
                        <?php if (
                            $key == 'id' || $key == 'uuid' || $key == 'foto' ||
                            $key == 'note' || $key == 'created_at' || $key == 'created_by' ||
                            $key == 'modified_at' || $key == 'modified_by' || $key == 'deleted_at' ||
                            $key == 'deleted_by' || $key == 'is_deleted' || $key == 'is_restored' ||
                            $key == 'restored_at' || $key == 'restored_by' || $key == 'status'
                        ) : ?>
                            <?php continue ?>
                        <?php endif ?>
                        <li>
                            <p><?= $key ?> : <?= $val ?></p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!--end info tabel-->