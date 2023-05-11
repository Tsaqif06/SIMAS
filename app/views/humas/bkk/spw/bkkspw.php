<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Sekolah Pencetak Wirausaha</h3>
          <h6 class="font-weight-normal mb-0">Laman Data SPW | <span class="text-primary">SIMAS</span></h6>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="card data-icon-card-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-8 text-white">
                  <h3>Form SPW</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <a href="<?= BASEURL; ?>/bkk/formspw"><button type="button" class="btn btn-inverse-primary btn-fw btn-block">Isi form</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="card data-icon-card-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-8 text-white">
                  <h3>Data SPW</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <a href="<?= BASEURL; ?>/bkk/tablespw"><button type="button" class="btn btn-inverse-primary btn-fw btn-block">Masuk ke laman ini</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. SIMAS. All rights reserved.</span>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../vendors/chart.js/Chart.min.js"></script>
<script src="../vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="../js/dataTables.select.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#tablespw').DataTable();
  });
</script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../js/off-canvas.js"></script>
<script src="../js/hoverable-collapse.js"></script>
<script src="../js/template.js"></script>
<script src="../js/settings.js"></script>
<script src="../js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../js/dashboard.js"></script>
<script src="../js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>

</html>