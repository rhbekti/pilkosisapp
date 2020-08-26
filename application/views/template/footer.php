 <!-- Footer -->
 <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Unity Dev <?=date('Y')?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah Anda yakin akan keluar?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="<?=base_url('Login/logout');?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>/assets/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>/assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>/assets/sbadmin/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?=base_url()?>/assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>/assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- chat script -->
 <script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>/assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
  <script src="<?=base_url()?>/assets/sbadmin/vendor/sweetalert2/sweetalert2.min.js"></script>
  <!-- daterangepicker -->
<script src="<?=base_url();?>/assets/sbadmin/vendor/moment/moment.min.js"></script>
<script src="<?=base_url();?>/assets/sbadmin/vendor/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?=base_url();?>/assets/sbadmin/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
