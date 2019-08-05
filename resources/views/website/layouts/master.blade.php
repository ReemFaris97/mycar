<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Firebase -->

    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase.js"></script>


    <link rel="manifest" href="{{asset('manifest.json')}}">

    @if(auth()->check())
        <script>
            var userId = '{{ auth()->id() }}';
            var url = '{{ route('web.update.token') }}';
            var lang = '{{ config('app.locale') }}';
        </script>
    @endif


    <title> @lang('web.site_name') - @lang('web.main') </title>
    @yield('styles')
    @include('website.layouts.styles')

</head>



<body>
<div class="body-overlay"></div>
<!-- Start Loading-Page -->
<div class="loader">
    <div class="loading-window">
        <div class="car">
            <div class="strike"></div>
            <div class="strike strike2"></div>
            <div class="strike strike3"></div>
            <div class="strike strike4"></div>
            <div class="strike strike5"></div>
            <div class="car-detail spoiler"></div>
            <div class="car-detail back"></div>
            <div class="car-detail center"></div>
            <div class="car-detail center1"></div>
            <div class="car-detail front"></div>
            <div class="car-detail wheel"></div>
            <div class="car-detail wheel wheel2"></div>
        </div>

        <div class="text">
            <span>Loading</span><span class="dots">...</span>
        </div>
    </div>
</div>
<!-- End Loading-Page -->


@include('website.layouts.header')

@include('website.layouts.menu')


@yield('content')

<!-- Start Footer -->
@include('website.layouts.footer')
<!-- End Footer -->


<!----------------- Start Chat Modal -------------------->
<div id="modal-container" class="modaling">
    <div class="modal-background">
        <div class="modal">
            <span class="closeit"> <i class="fas fa-times"></i> </span>
            <h2>@lang('web.direct_q_customer_service')</h2>

            <div class="chats" id="chats">


                @forelse($webChannel->messages as $message)
                    @if($message->user_id !=auth()->id())
                <div class="chat1 recieve">
                    <div class="chat-img">
                        <img src="{{asset('website/img/1.png')}}">
                    </div>
                    <div class="chat-body">
                        <p>
                           {{$message->body}}
                        </p>
                    </div>
                </div>

                    @else

                <div class="chat1 send">
                    <div class="chat-img">
                        <img src="{{asset('website/img/1.png')}}">
                    </div>
                    <div class="chat-body">
                        <p>
                            {{$message->body}}
                        </p>
                    </div>
                </div>
                    @endif

                @empty

                @endforelse


            </div>

            <form class="chatting" id="my_form">
                <textarea rows="4" cols="95" id="inbox" class="form-control input-lg" data-fv-field="inbox" placeholder="@lang('web.enter_message')"></textarea>
                <button type="button" id="sendnow"> <i class="fas fa-arrow-right"></i> </button>
            </form>

            <!--
            <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none">
                <rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
            </svg>
-->
        </div>
    </div>
</div>
<!----------------- End Chat Modal -------------------->

<!----------------- Start Call Modal -------------------->
<div id="modal-call" class="">
    <div class="modal-background">
        <div class="modal">
            <span class="closeit"> <i class="fas fa-times"></i> </span>

            <a href="index.html">
                <img src="{{asset('website/img/logo.png')}}">
            </a>

            <p>
                @lang('web.you_will_be_contacted_by')<span>+965158156</span>
            </p>
            <p>
                @lang('web.by_service_agent')
            </p>

            <div id="countdown-1"></div>
            <p><button id="reset-1" type="button">Reset this timer</button></p>

            <div class="clock"></div>
            <div class="clock"></div>

        </div>
    </div>
</div>
<!----------------- End Call Modal -------------------->




<!--Scroll Button-->
<div id="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>



<!-- Strat End -->
<!--===============================
     SCRIPT
     ===================================-->
@include('website.layouts.scripts')
<script>
    new WOW().init();

</script>

<!----------- This for here only ------------>
<script src="{{asset('website/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
<script>
    $("#owl-demo").owlCarousel({
        rtl: true,
        loop: true,
        autoplay: false,
        items: 1,
        dots: true,
        autoplayHoverPause: false,
        animateOut: 'flipOutX',
        animateIn: 'flipInX',
        nav: true,
        navText: [
            '<i class="fas fa-angle-right"></i>',
            '<i class="fas fa-angle-left"></i>'
        ],
        rewindNav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            991: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

</script>
<script>
    $("#owl-suggest").owlCarousel({
        rtl: true,
        items: 3,
        autoplay: false,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        loop: true,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 2],
        nav: true,
        navText: ["<i class='fas fa-angle-right'>", "<i class='fas fa-angle-left'>"],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

</script>


<!-- -->
<script>

    // This piece of code for toaster notification....
    //---------------------------------------------------

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
            positionClass: 'toast-top-left',
            onclick: null,
            // showMethod: 'slideDown',
            // hideMethod: "slideUp",
            showDuration: "1500",
            hideDuration: "1500",
            timeOut: "2000",
            extendedTimeOut: "2000",
        };
        var $toast = toastr[shortCutFunction](msg, title);
        // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
    }

    @if(session()->has('error'))
    setTimeout(function () {
        showError('{{ session()->get('error') }}');
    }, 1000);
    @endif
    function showError(message) {
        var shortCutFunction = 'error';
        var msg = message;
        var title = "@lang('web.error')";
        toastr.options = {
            positionClass: 'toast-top-left',
            onclick: null,
            // showMethod: 'slideDown',
            // hideMethod: "slideUp",
            showDuration: "1500",
            hideDuration: "1500",
            timeOut: "2000",
            extendedTimeOut: "2000",
        };
        var $toast = toastr[shortCutFunction](msg, title);
        // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
    }

    //*************************************************************

</script>


</body>

</html>
