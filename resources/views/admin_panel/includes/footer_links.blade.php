<!-- JS Vendor Files -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
<script src="{{ asset('assets/vendor/jsvectormap/maps/world.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script> --}}
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- CDN Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- DataTable Initialization -->
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>

<!-- Loader Script -->
<script>
    window.addEventListener('load', function () {
      const loaderOverlay = document.getElementById('loader-overlay');
      const mainContent = document.getElementById('main-content');
      const body = document.body;

      setTimeout(() => {
        loaderOverlay.style.opacity = '0';
        loaderOverlay.addEventListener('transitionend', function () {
          loaderOverlay.style.display = 'none';
          mainContent.style.display = 'block';
          body.classList.remove('loading');
          body.style.overflow = 'auto'; // Enable scroll after load
        }, { once: true });
      }, 500);
    });
</script>
</body>
</html>
