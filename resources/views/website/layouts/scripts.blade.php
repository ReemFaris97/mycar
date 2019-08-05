
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

<script>
    // This piece of code for toaster notification....

    @if(session()->has('success'))
    setTimeout(function () {
        showMessage('{{ session()->get('success') }}');
    }, 2000);

    @endif

    function showMessage(message) {
        var shortCutFunction = 'success';
        var msg = message;
        var title = "@lang('web.success')";
        toastr.options = {
            positionClass: 'toast-top-center',
            onclick: null,
            showMethod: 'slideDown',
            hideMethod: "slideUp",
            showDuration: "1000",
            hideDuration: "1000",
            timeOut: "1500",
            extendedTimeOut: "2000",
        };
        var $toast = toastr[shortCutFunction](msg, title);
        // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
    }

</script>
<script src="{{asset('website/js/script.js')}}"></script>

