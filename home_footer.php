

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; ILLUMINATI </p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/widgets/datatable/datatable.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

  

  });


  $(document).ready(function(){
    <?php if($xo) {?>
    $('table.table').dataTable();
    <?php } ?>
  });
</script>


  </body>

</html>