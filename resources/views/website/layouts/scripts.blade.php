
<script src="{{asset('website/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('website/js/jquery.time-to.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/all.min.js')}}"></script>
<script src="{{asset('website/js/wow.min.js')}}"></script>

<!-- Validation js (Parsleyjs) -->

<script type="text/javascript" src="{{asset('admin/assets/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<!-- Toastr js -->
<script src="{{asset('admin/assets/plugins/toastr/toastr.min.js')}}"></script>

@yield('scripts')


<script src="{{asset('website/js/script.js')}}"></script>

