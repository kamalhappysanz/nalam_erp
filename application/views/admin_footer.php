<footer class="footer text-right">
    2017 - 2018 © Abstack. - Coderthemes.com
</footer>

</div>




</div>
<!-- END wrapper -->







<!-- Required datatable js -->
  <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>plugins/datatables/jszip.min.js"></script> -->
  <script src="<?php echo base_url(); ?>plugins/datatables/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables/buttons.print.min.js"></script>
  <!-- Responsive examples -->
  <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<!-- Chart JS -->
<script src="<?php echo base_url(); ?>plugins/chart.js/chart.bundle.js"></script>

<!-- init dashboard -->
<!-- <script src="<?php echo base_url(); ?>assets/pages/jquery.dashboard.init.js"></script> -->

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

<script type="text/javascript">
           $(document).ready(function() {

               $('#datatable').DataTable();

               //Buttons examples
               var table = $('#datatable-buttons').DataTable({
                   lengthChange: false,
                   buttons: ['copy', 'excel', 'pdf']
               });

               table.buttons().container()
                       .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
           } );

       </script>
</body>
</html>
