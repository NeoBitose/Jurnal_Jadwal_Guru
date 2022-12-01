<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="{{ asset('asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset/js/materialize.min.js') }}"></script>
<script src="{{ asset('asset/js/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- ============================================================== -->
<!-- Apps -->
<!-- ============================================================== -->
<script src="{{ asset('asset/js/app.js') }}"></script>
<script src="{{ asset('asset/js/app.init.dark.js') }}"></script>

<!-- ============================================================== -->
<!-- Custom js -->
<!-- ============================================================== -->
<script src="{{ asset('asset/js/custom.min.js') }}"></script>
<script src="{{ asset('asset/js/datatables.min.js') }}"></script>
<script src="{{ asset('asset/js/datatable-advanced.init.js') }}"></script>
{{-- <script src="{{ asset('asset/js/datatable-basic.init.js') }}"></script> --}}
{{-- <script src="{{ asset('asset/DataTables/datatables.min.js') }}"></script> --}}

<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script src="{{ asset('asset')}}/js/chartjs.init.js"></script>
<script src="{{ asset('asset')}}/js/Chart.min.js"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>
    $('.tooltipped').tooltip();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $(function () {
        $(".preloader").fadeOut();
    });
</script>