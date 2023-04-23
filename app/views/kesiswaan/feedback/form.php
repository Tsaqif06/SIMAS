<form action="<?= BASEURL; ?>/feedback/tambahData" method="post">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="NIS">NIS</label>
        <input type="number" class="form-control" id="NIS" name="NIS">
    </div>

    <div class="form-group">
        <label for="EMAIL">Email address</label>
        <input type="email" class="form-control" id="EMAIL" name="EMAIL">
    </div>

    <div class="form-group">
        <label for="FEEDBACK">Feedback</label>
        <input type="text" class="form-control" id="FEEDBACK" name="FEEDBACK">
    </div>