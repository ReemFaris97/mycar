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
<audio id="myAudio">
    <source src="{{asset('notification.ogg')}}" type="audio/ogg">
</audio>
<!-- End Footer -->



<!----------------- Start Chat Modal -------------------->
<div id="modal-container" class="modaling">
    <div class="modal-background">
        <div class="modal">
            <span class="closeit"> <i class="fas fa-times"></i> </span>
            <h2>سؤال مباشر - خدمة العملاء</h2>

            <div class="chats" id="chats">

                @forelse($webChannel->messages as $message)
                    @if($message->user_id != auth()->id())
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
                        <img src="{{getimg(auth()->user()->image)}}">
                    </div>
                    <div class="chat-body">
                        <p>
                            {{$message->body}}
                        </p>
                    </div>
                </div>

                @endif

                @empty
                    <div class="chat1 recieve">
                        <div class="chat-img">
                            <img src="{{asset('website/img/1.png')}}">
                        </div>
                        <div class="chat-body">
                            <p>
                                مرحبا بك، كيف نساعدك ؟؟
                            </p>
                        </div>
                    </div>
                @endforelse



            </div>

            <form class="chatting" id="messageForm" method="post" action="{{route('web.message.store',$webChannel->id)}}" >

                <textarea rows="4" cols="95" id="inbox" class="form-control input-lg" data-fv-field="inbox" placeholder="اكتب رسالتك..."></textarea>
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


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDYkaLf81OdUKQrb5ASJMfLRAo-zZGbhTQ",
        authDomain: "mycar-part.firebaseapp.com",
        databaseURL: "https://mycar-part.firebaseio.com",
        projectId: "mycar-part",
        storageBucket: "",
        messagingSenderId: "439752799792",
        appId: "1:439752799792:web:252944a701d8d363"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    // Retrieve Firebase Messaging object.
    const messaging = firebase.messaging();

    messaging.requestPermission().then(function() {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        // ...
        getRegToken();


    }).catch(function(err) {
        console.log('Unable to get permission to notify.', err);
    });
    function getRegToken(){
        // Get Instance ID token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
        messaging.getToken().then(function(currentToken) {
            if (currentToken) {
                console.log(currentToken);
                saveTokenInDatabase(currentToken);
                // updateUIForPushEnabled(currentToken);
                setTokenSentToServer(true);
            } else {
                // Show permission request.
                console.log('No Instance ID token available. Request permission to generate one.');
                // Show permission UI.
                // updateUIForPushPermissionRequired();
                setTokenSentToServer(false);
            }
        }).catch(function(err) {
            console.log('An error occurred while retrieving token. ', err);
//   showToken('Error retrieving Instance ID token. ', err);
//   setTokenSentToServer(false);
        });
    }
    function setTokenSentToServer(sent) {
        window.localStorage.setItem('sentToServer', sent ? '1' : '0');
    }

    // function isTokenSentToServer() {
    //     return window.localStorage.getItem('sentToServer') === '1';
    //     }

    function saveTokenInDatabase(currentToken){

        if (userId) {
            $.ajax({
                type: "POST",
                url: url,
                data: {id: userId, token: currentToken},
                success: function (data) {
                    console.log('token saved in database successfully')
                }
            });
        }

    }


    messaging.onMessage(function(payload) {
        console.log('Message received. ', payload);


        title = payload.data.title;
        options = {
            'body':payload.data.body,
            'icon':payload.data.icon,
            'image':payload.data.image,
        };
        var image = "{{asset('website/img/1.png')}}";
        var user_id = payload.data.user_id;
        var auth_id = "{{auth()->id()}}";
        var deleteUrl = "{{route('web.delete.notification')}}";
        var imageSrc  = "{{asset('website/img/bell.svg')}}";
        if(payload.data.type == 'order') {
            $('.notification').append(
                '<div class="notice" id="NotifiyDiv'+payload.data.notify_id+'"'+
                '<button data-id="'+payload.data.notify_id+'"'+'data-url="'+deleteUrl+'" type="button" class="close">×</button>'+
                '<img src="'+imageSrc+'">'+
                '<h4>' + payload.data.title + '</h4>'+
                '<a href="#">'+payload.data.message+'</a>'+'</div>'


                {{--<div class="notice" id="NotifyDiv{{$notify->id}}">--}}
                {{--<button data-id="{{$notify->id}}" data-url="{{route('web.delete.notification')}}" type="button" class="close">×</button>--}}
                {{--    <img src="{{asset('website/img/bell.svg')}}">--}}
                {{--<h4>{{$notify->title()}}</h4>--}}
                {{--<a href="#">{{$notify->message()}}</a>--}}
                // </div>
            );
        }else{
            if(user_id != auth_id) {
                $('#chats').append(
                    '<div class="chat1 recieve">\n' +
                    '                    <div class="chat-img">\n' +
                    '                        <img src="' + image + '">\n' +
                    '                    </div>\n' +
                    '                    <div class="chat-body">\n' +
                    '                        <p>\n' +
                    payload.data.body +
                    '                        </p>\n' +
                    '                    </div>\n' +
                    '                </div>'
                );
            }
        }



        {{--<div class="chat1 recieve">--}}
        {{--    <div class="chat-img">--}}
        {{--    <img src="{{asset('website/img/1.png')}}">--}}
        {{--    </div>--}}
        {{--    <div class="chat-body">--}}
        {{--    <p>--}}
        {{--    {{$message->body}}--}}
        {{--    </p>--}}
        {{--    </div>--}}
        {{--    </div>--}}

        var sound = document.getElementById("myAudio");
        if(sound.play()){
            console.log('sound played well');
        }
        else
        {
            console.log('can not be played');
        }

        if(user_id != auth_id) {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "20000",
                "extendedTimeOut": "20000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr["success"]("رسالة من الإدارة", payload.data.body);
        }

    });




    ////////////// chat modal/////////////////////////////////////////////////////////////////////////////////////////
    $('#seven').click(function () {
        //////////////////// textarea focus //////////////////////////////////////
        $('#inbox').focus();
        var buttonId = $(this).attr('id');
        $('#modal-container').removeAttr('class').addClass(buttonId);
        $('body').addClass('modal-active');
        $('#chats').scrollTop($('#chats')[0].scrollHeight);
    });

    $('.closeit').click(function () {
        $('#modal-container').addClass('out');
        $('body').removeClass('modal-active');
    });


    ///////////////////// enter submit /////////////
    $('#inbox').keydown(function () {
        $('#chats').scrollTop($('#chats')[0].scrollHeight);

        var message = $("#inbox").val();

        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }
        if (event.keyCode == 13) {
            if (isEmptyOrSpaces(message)) {
                alert("Enter Some Text In Textarea");
            } else {


                var form = $('#messageForm');


                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: {body:message},
                    // cache: false,
                    // contentType: false,
                    // processData: false,
                    success: function (data) {

                        if (data.status === true) {

                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };
                            // var $toast = toastr['success'](msg,title);
                            // $toastlast = $toast;
                            $('#messageForm').each(function () {
                                this.reset();
                            });

                            var msgSend = $(".chat1.send").val();
                            $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="img/1.png"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');
                            $("textarea").val('');
                            $('#chats').scrollTop($('#chats')[0].scrollHeight);
                            return false;
                            $('#inbox').focus();

                        } else {
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };
                            var $toast = toastr['error'](msg,title);
                            $toastlast = $toast;

                        }
                    },
                    error: function (data) {

                    }
                });




            }
            {{--    var msgSend = $(".chat1.send").val();--}}
            {{--    $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="{{asset('website/img/1.png')}}"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');--}}
            {{--    //      $(".newmsg").text();--}}
            {{--    //      $('#my_form').submit();--}}
            {{--    //      alert("Your message is sent succesfully:- " );--}}
            {{--}--}}
            {{--$("#inbox").val('');--}}
            {{--$('#chats').scrollTop($('#chats')[0].scrollHeight);--}}
            {{--return false;--}}
            {{--$('#inbox').focus();--}}
        }
    });

    $('#sendnow').click(function () {
        $('#inbox').focus();
        var message = $("#inbox").val();
        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }
        if (isEmptyOrSpaces(message)) {
            alert("Enter Some Text In Textarea");
        } else {

            var msgSend = $(".chat1.send").val();
            $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="img/1.png"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');
            //                $(".newmsg").text();

            //                $('#my_form').submit();
            //                alert("Your message is sent succesfully:- " );
        }
        $("#inbox").val('');

        //                var len = $('#chats').height();
        //                console.log(len);
        //               $('#chats').scrollTop(len * 1000);

        $('#chats').scrollTop($('#chats')[0].scrollHeight);

        return false;
    });

    //////////// Append Chat .///////////////////////




</script>


</body>

</html>
