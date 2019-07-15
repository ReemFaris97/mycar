<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title> قطعة سيارتى </title>
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{asset('website/img/logo-sm.png')}}">
    <link rel="stylesheet" href="{{asset('website/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/timeTo.css')}}">
    <!-- This for here -->
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/jquery.fancybox.min.css')}}">
    <!-- -->
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
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


<!-- Start Index -->
<section class="index all-sections">
    <div class="container">

        <div class="biginings">
            <div class="row">

                <div class="col-md-7 col-xs-12">
                    <div class="logo-nav"><img src="{{asset('website/img/logo.png')}}"></div>
                </div>

                <div class="col-md-5 col-xs-12">
                    <a href="sign-divider.html" class="apply"> انضم كمورد </a>
                </div>

            </div>
        </div>

        <div class="ordering">
            <p>
                لا تتردد امامك <span class="stp">4</span> خطوات بسيطة
            </p>
            <p>
                رد مباشر من شركات قطع الغيار فى غضون <span class="stp">4</span> دقائق
            </p>
        </div>

        <a data-fancybox="Gallery" data-caption="كيفية الطلب" href="{{asset('website/img/index.png')}}" class="inx">
            <img src="{{asset('website/img/index.png')}}">
        </a>

        <a href="wizard-divider.html" class="apply"> البحث عن موزع </a>

    </div>
</section>
<!-- End Index -->


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

<!-- -->
<script src="{{asset('website/js/script.js')}}"></script>


</body>

</html>
