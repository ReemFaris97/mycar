<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title> قطعة سيارتى - انضم كمورد </title>
    <!-- Notification css (Toastr) -->
    <link href="{{asset('admin/assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{asset('website/img/logo-sm.png')}}">
    <link rel="stylesheet" href="{{asset('website/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style1.css')}}">
    <style>
        .parsley-errors-list{
            color:red;
        }
    </style>

    <script src="{{asset('website/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('website/js/respond.min.js')}}"></script>
</head>



<body class="no-padding">
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


<!-- Start sign-up -->
<section class="sign-up all-sections">
    <div class="light-overlay"></div>
    <div class="container">

        <div class="content-in">

            <a href="begin.html" class="logo-nav"><img src="{{asset('website/img/logo.png')}}"></a>

            <form autocomplete="off" data-parsley-validate novalidate class="form2 signing" method="post" action="">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control" name="name" required  data-parsley-required-message="هذا الحقل مطلوب" placeholder="الإسم ..">
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input type="number" name="number" required  data-parsley-required-message="هذا الحقل مطلوب" class="form-control" placeholder="رقم الهاتف">
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input
                        type="password" name="password" id="pass1"
                        class="form-control" autocomplete="off"
                        placeholder="كلمة المرور ..."
                        required
                        data-parsley-trigger="keyup"
                        data-parsley-required-message="كلمة المرور مطلوبة"
                        data-parsley-maxlength="55"
                        data-parsley-minlength="6"
                        data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"
                        data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف"
                    >
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input
                        data-parsley-equalto="#pass1" name="password_confirmation" type="password" data-parsley-trigger="keyup"
                        placeholder="تأكيد كلمة المرور ..." class="form-control"
                        autocomplete="off"
                        id="passWord2" required
                        data-parsley-required-message="تأكيد كلمة المرور مطلوب"
                        data-parsley-equalto-message="تأكيد كلمة المرور غير متطابقة"
                        data-parsley-maxlength="55"
                        data-parsley-minlength="6"
                        data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"
                        data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف"
                    >
                    <span class="focus-border"><i></i></span>
                </div>


                <div class="form-group">
                    <input type="text" name="licence_number" required data-parsley-required-message="هذا الحقل مطلوب" class="form-control" placeholder="رقم السجل التجارى">
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input type="number" name="commission" required
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-max="99"
                                           data-parsley-min="1"
                                           data-parsley-max-message="اقصى نسبة هي 99"
                                           data-parsley-min-message="اقل نسبة هي 1"
{{--                                           data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
{{--                                           data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                           class="form-control" placeholder="نسبة التطبيق من المبيعات">
                    <span class="focus-border"><i></i></span>
                </div>




                <div class="form-group">
                    <input id="uploadFile" name="licence_image" required data-parsley-required-message="هذا الحقل مطلوب" class="f-input form-control" placeholder="صورة السجل التجارى" />
                    <div class="fileUpload btn btn--browse">
                        <span>Browse</span>
                        <input id="uploadBtn" type="file" class="upload" />
                    </div>
                    <span class="focus-border"><i></i></span>
                </div>

{{--                <div class="form-group">--}}
{{--                    <input id="uploadFile2" class="f-input form-control" placeholder="صورة المحل" />--}}
{{--                    <div class="fileUpload btn btn--browse">--}}
{{--                        <span>Browse</span>--}}
{{--                        <input id="uploadBtn2" type="file" class="upload" />--}}
{{--                    </div>--}}
{{--                    <span class="focus-border"><i></i></span>--}}
{{--                </div>--}}

                <div class="form-group">
                    <textarea rows="4" cols="95" class="form-control input-lg input-sm" data-fv-field="inbox" placeholder="اوصف العنوان"></textarea>
                    <span class="focus-border"><i></i></span>
                </div>


                <div class="form-data">
                    <label>اللوكيشن</label>
                    <div class="form-group">
                        <div id="mapholder"></div>
                        <input type="button" onclick="getLocation();" class="form-control" />
                        <span class="focus-border"><i></i></span>
                    </div>
                </div>


                <button type="submit"  class="upload">تسجيل كمورد</button>


                {{--   Modals Buttons--}}

{{--                <button type="button" data-toggle="modal" data-target="#signModal" class="submit-in">--}}
{{--                    <i class="fas fa-arrow-right"></i>--}}
{{--                </button>--}}

            </form>

        </div>


    </div>
</section>
<!-- End sign-up -->




{{--<!--- Start Sign Modal --->--}}
{{--<div id="signModal" class="modal fade suggest-mdl" role="dialog">--}}
{{--    <div class="modal-dialog">--}}

{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>--}}
{{--                <h4 class="modal-title">تسجيل الدخول</h4>--}}
{{--            </div>--}}


{{--            <div class="logo-nav"><img src="{{asset('website/img/logo.png')}}"></div>--}}

{{--            <form class="form2 signing step1">--}}
{{--                <div class="form-group">--}}
{{--                    <input type="number" class="form-control" placeholder="رقم الهاتف">--}}
{{--                    <span class="sm-icon"> <i class="fas fa-paper-plane"></i> </span>--}}
{{--                    <span class="focus-border"><i></i></span>--}}
{{--                </div>--}}
{{--                <button type="button" class="submit-in" id="step2"> <i class="fas fa-arrow-right"></i> </button>--}}
{{--            </form>--}}


{{--            <div class="verfy">--}}
{{--                <form class="form2 signing" action="begin.html">--}}
{{--                    <p>--}}
{{--                        تم ارسال رمز مكون من 4 ارقام الى هاتفك الجوال و أدخله أدناه للمتابعة--}}
{{--                    </p>--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="number" class="form-control" placeholder="الكود المرسل">--}}
{{--                        <span class="sm-icon"> <i class="fas fa-check-circle"></i> </span>--}}
{{--                        <span class="focus-border"><i></i></span>--}}
{{--                    </div>--}}

{{--                    <p id="demo" class="timer"></p>--}}
{{--                    <!--                <input class="end-details" type="submit" value="تقديم عرض">-->--}}

{{--                    <!--  <button type="button" class="resend">اعادة ارسال</button>-->--}}
{{--                    <button type="button" class="submit-in" id="step3"> <i class="fas fa-arrow-right"></i> </button>--}}
{{--                </form>--}}
{{--                <button id="edit-1" type="button" class="resend"> تعديل رقم الهاتف </button>--}}
{{--            </div>--}}

{{--            <div class="area">--}}
{{--                <form class="form2 signing" action="begin.html">--}}

{{--                    <h5 class="choose">--}}
{{--                        اختر مكانك--}}
{{--                    </h5>--}}

{{--                    <div class="radio-list">--}}
{{--                        <label class="rad">داخل بريدة--}}
{{--                            <input type="radio" checked="checked" name="radio">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}
{{--                        <label class="rad">خارج بريدة--}}
{{--                            <input type="radio" name="radio">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <button type="submit" class="submit-in" id="step3"> <i class="fas fa-arrow-right"></i> </button>--}}
{{--                </form>--}}
{{--            </div>--}}


{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
{{--<!--- End Sign Modal --->--}}


<!-- Strat End -->
<!--===============================
     SCRIPT
     ===================================-->

<script src="{{asset('website/js/jquery-1.11.1.min.js')}}"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="{{asset('website/js/parsleyjs/dist/parsley.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('form').parsley();
    });

</script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>



<script src="{{asset('website/js/all.min.js')}}"></script>
<script src="{{asset('website/js/wow.min.js')}}"></script>

<script>
    new WOW().init();

</script>
<!--- This for here only -->
<script>
    function showLocation(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var latlongvalue = position.coords.latitude + "," +
            position.coords.longitude;
        var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=" +
            latlongvalue + "&zoom=14&size=400x300&key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
        document.getElementById("mapholder").innerHTML =
            "<img src='" + img_url + "'>";
    }


    function errorHandler(err) {
        if (err.code == 1) {
            alert("Error: Access is denied!");
        } else if (err.code == 2) {
            alert("Error: Position is unavailable!");
        }
    }

    function getLocation() {
        if (navigator.geolocation) {
            // timeout at 60000 milliseconds (60 seconds)
            var options = {
                timeout: 60000
            };
            navigator.geolocation.getCurrentPosition(showLocation, errorHandler, options);
        } else {
            alert("Sorry, browser does not support geolocation!");
        }
    }

</script>

<!---------------- Input type file --------------------->
<script>
    document.getElementById("uploadBtn").onchange = function() {
        document.getElementById("uploadFile").value = this.value.replace("C:\\fakepath\\", "");
    };

    document.getElementById("uploadBtn2").onchange = function() {
        document.getElementById("uploadFile2").value = this.value.replace("C:\\fakepath\\", "");
    };

</script>
<!---->

<script src="{{asset('website/js/script.js')}}"></script>

</body>

</html>
