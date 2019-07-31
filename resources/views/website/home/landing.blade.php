<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> قطعة سيارتى </title>
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{asset('website/img/logo-sm.png')}}">
    <link rel="stylesheet" href="{{asset('website/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">

    <!-- This for here -->
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/jquery.fancybox.min.css')}}">
    <!-- -->
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style1.css')}}">
    <!-- Notification css (Toastr) -->
    <link href="{{asset('admin/assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .parsley-errors-list{
            color: red;
        }
    </style>
</head>



<body class="index-body">
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


<!-- Start Index -->
<section class="index">
    <div class="container">

        <div class="biginings">
            <div class="row">

                <div class="col-sm-7 col-xs-12">
                    <div class="logo-nav"><img src="{{asset('website/img/logo.png')}}"></div>
                </div>

                <div class="col-sm-5 col-xs-12">
                    <a href="{{route('web.get.register.supplier')}}" class="apply"> @lang('web.join_as_supplier') </a>
                </div>

                <div class="col-sm-5 col-xs-12">
                    <a href="" data-toggle="modal" data-target="#signModal" class="apply"> تسجيل جديد/دخول </a>
                </div>

            </div>
        </div>

        <div class="ordering">
            <p>
                @lang('web.dont_hesitate') <span class="stp">4</span> @lang('web.simple_steps')
            </p>
            <p>
                @lang('web.direct_reply') <span class="stp">4</span> @lang('web.minutes')
            </p>
        </div>

        <a data-fancybox="Gallery" data-caption="@lang('web.how_to_order')" href="{{asset('website/img/index.png')}}" class="inx">
            <img src="{{asset('website/img/index.png')}}">
        </a>

        <a href="wizard-divider.html" class="apply"> @lang('web.search_supplier') </a>

    </div>
</section>
<!-- End Index -->


<!--- Start Sign Modal --->
<div id="signModal" class="modal fade suggest-mdl" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                <h4 class="modal-title">تسجيل الدخول</h4>
            </div>


            <div class="logo-nav"><img src="{{asset('website/img/logo.png')}}"></div>

            <form id="phoneForm" data-parsley-validate method="post" action="{{route('web.sign.phone')}}" class="form2 signing step1">
                <div class="form-group">
                    <input type="number" id="phoneNumber" name="phone" required data-parsley-required-message="رقم الهاتف مطلوب"  class="form-control" placeholder="رقم الهاتف">
                    <span class="sm-icon"> <i class="fas fa-paper-plane"></i> </span>
                    <span class="focus-border"><i></i></span>
                </div>

                <button type="submit" class="submit-in" id="step2"> <i class="fas fa-arrow-right"></i> </button>

                <button type="button" style="display: none;" class="submit-in" id="stepWithNoAction"> <i class="fas fa-arrow-right"></i> </button>

            </form>


            <div class="verfy">
                <form id="checkCodeForm" data-parsley-validate method="post" action="{{route('web.sign.checkCode')}}" class="form2 signing" >
                    <p>
                        تم ارسال رمز مكون من 4 ارقام الى هاتفك الجوال و أدخله أدناه للمتابعة
                    </p>
                    <div class="form-group">
                        <input type="number" name="code" class="form-control" placeholder="الكود المرسل">
                        <span class="sm-icon"> <i class="fas fa-check-circle"></i> </span>
                        <span class="focus-border"><i></i></span>
                    </div>

                    <p id="demo" class="timer"></p>
                    <!--                <input class="end-details" type="submit" value="تقديم عرض">-->

                    <!--  <button type="button" class="resend">اعادة ارسال</button>-->
                    <button type="submit" class="submit-in" > <i class="fas fa-arrow-right"></i> </button>
                </form>
                <button id="edit-1" type="button" class="resend"> تعديل رقم الهاتف </button>
            </div>

            <div class="area">
                <form id="regionForm" class="form2 signing" action="{{route('web.update.auth.region')}}" method="POST">

                    <h5 class="choose">
                        اختر مكانك
                    </h5>

                    <div class="radio-list">
                        <label class="rad">داخل بريدة
                            <input type="radio" value="inside" checked="checked" name="region">
                            <span class="checkmark"></span>
                        </label>
                        <label class="rad">خارج بريدة
                            <input type="radio" value="outside" name="region">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <button type="submit" class="submit-in" > <i class="fas fa-arrow-right"></i> </button>
                </form>
            </div>


        </div>

    </div>
</div>
<!--- End Sign Modal --->


<!--Scroll Button-->
<div id="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>



<!-- Strat End -->
<!--===============================
     SCRIPT
     ===================================-->

<script src="{{asset('website/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/all.min.js')}}"></script>
<script src="{{asset('website/js/wow.min.js')}}"></script>
<script>
    new WOW().init();

</script>

<!----------- This for here only ------------>
<script src="{{asset('website/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('website/js/parsleyjs/dist/parsley.min.js')}}"></script>
<!-- Toastr js -->
<script src="{{asset('admin/assets/plugins/toastr/toastr.min.js')}}"></script>
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
        var title = "نجاح";
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

<!-- -->
<script src="{{asset('website/js/script.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(".verfy").slideUp();
    $(".area").slideUp();
    var phoneNumber;

    $('#phoneForm').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    if (data.status === true) {
                        var title = data.title;
                        var msg = data.message;
                        toastr.options = {
                            positionClass : 'toast-top-left',
                            onclick:null
                        };
                        var $toast = toastr['success'](msg,title);
                        $toastlast = $toast;
                        // form.each(function () {
                        //     this.reset();
                        // });
                        phoneNumber = data.phone;
                        //replace button for not send again ...
                        $('#step2').hide();
                        $('#stepWithNoAction').show();


                        $(".step1").slideUp(750);
                        $(".verfy").slideDown(750);

                        $('#checkCodeForm').append('<input type="hidden" name="phone" value="'+phoneNumber+'">');


                    } else {
                        var title = data.title;
                        var msg = data.message;
                        toastr.options = {
                            positionClass : 'toast-top-left',
                            onclick:null
                        };
                        var $toast = toastr['error'](msg,title);
                        $toastlast = $toast;
                        form.each(function () {
                            this.reset();
                        });

                    }
                },
                error: function (data) {

                }
            });
        }
    });

    $('#checkCodeForm').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    if (data.status === true) {
                        var title = data.title;
                        var msg = data.message;
                        toastr.options = {
                            positionClass : 'toast-top-left',
                            onclick:null
                        };
                        var $toast = toastr['success'](msg,title);
                        $toastlast = $toast;
                            $(".verfy").slideUp(500);
                            $(".step1").slideUp(500);
                            $(".area").slideDown(500);


                        // form.each(function () {
                        //     this.reset();
                        // });


                    } else {
                        var title = data.title;
                        var msg = data.message;
                        toastr.options = {
                            positionClass : 'toast-top-left',
                            onclick:null
                        };
                        var $toast = toastr['error'](msg,title);
                        $toastlast = $toast;
                        form.each(function () {
                            this.reset();
                        });

                    }
                },
                error: function (data) {

                }
            });
        }
    });

    $('#regionForm').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    if (data.status === true) {
                        var title = data.title;
                        var msg = data.message;
                        toastr.options = {
                            positionClass : 'toast-top-left',
                            onclick:null
                        };
                        var $toast = toastr['success'](msg,title);
                        $toastlast = $toast;

                        setTimeout(function(){
                            window.location.href ="{{route('web.home')}}";
                        }, 2000);
                        // form.each(function () {
                        //     this.reset();
                        // });


                    } else {
                        var title = data.title;
                        var msg = data.message;
                        toastr.options = {
                            positionClass : 'toast-top-left',
                            onclick:null
                        };
                        var $toast = toastr['error'](msg,title);
                        $toastlast = $toast;
                        // form.each(function () {
                        //     this.reset();
                        // });

                    }
                },
                error: function (data) {

                }
            });
        }
    });





    $("#stepWithNoAction").on("click", function () {
        if(phoneNumber == $('#phoneNumber').val()){
            $(".step1").slideUp(500);
            $(".verfy").slideDown(500);
        }else{
            $('#stepWithNoAction').hide();
            $('#step2').show();
            phoneNumber = $('#phoneNumber').val();
        }

    });


    $("#edit-1").on("click", function () {
        $(".verfy").slideUp(500);
        $(".step1").slideDown(500);

        if(! phoneNumber == $('#phoneNumber').val()){
            $('#stepWithNoAction').hide();
            $('#step2').show();
        }

    });

    $("#step2").click(function () {
        $('#countdown-1').timeTo(120, function () {
            alert('Countdown finished');
        });
        $('#reset-1').click(function () {
            $('#countdown-1').timeTo('reset');
        });

    });

    // $("#step3").on("click", function () {
    //     $(".verfy").slideUp(500);
    //     $(".step1").slideUp(500);
    //     $(".area").slideDown(500);
    // });

    $("#stepwithNoAction").on("click", function () {
        if(phoneNumber == $('#phoneNumber').val()){
            $(".step1").slideUp(500);
            $(".verfy").slideDown(500);
        }

    });

</script>


</body>

</html>
