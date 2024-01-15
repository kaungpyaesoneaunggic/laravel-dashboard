<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href={{ asset("https://adminlte.io")}}>AdminLTE.io</a>.</strong>
  All rights reserved.
  
  
<div class="float-right d-none d-sm-inline-block">
  <a class="btn btn-outline-dark" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
  </form>
</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src={{ asset("plugins/jquery/jquery.min.js")}}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{ asset("plugins/jquery-ui/jquery-ui.min.js")}}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- ChartJS -->
<!-- Sparkline -->
<!-- JQVMap -->
<!-- jQuery Knob Chart -->
<!-- daterangepicker -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- Summernote -->
<!-- overlayScrollbars -->
<script src={{ asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{ asset("dist/js/adminlte.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset("dist/js/demo.js")}}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset("dist/js/pages/dashboard.js")}}></script>