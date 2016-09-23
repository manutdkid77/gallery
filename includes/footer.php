
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="margin:1em 0;">
                    <p class="text-center">Copyright &copy; OOP Gallery <?php echo date('Y');?></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Script for running Masonry.js -->
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>

    <script type="text/javascript">
        $('.grid-item:even').addClass('grid-item--width2');

        $('.grid').masonry({
          // options
          itemSelector: '.grid-item',
          columnWidth: 240
        });
    </script>
    <!-- End of masonry script -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
