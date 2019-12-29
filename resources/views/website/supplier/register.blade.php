<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title>@lang('web.site_name') - @lang('web.join_as_supplier') </title>
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

            <a href="{{route('web.landing')}}" class="logo-nav"><img src="{{asset('website/img/logo.png')}}"></a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    <h3>{{session()->get('success')}}</h3>
                </div>
            @endif
            <form autocomplete="off" data-parsley-validate novalidate class="form2 signing" method="post" action="{{route('web.post.register.supplier')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control" name="name" required  data-parsley-required-message="@lang('web.field_required')" placeholder="@lang('web.name')">
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input type="number" name="phone" required  data-parsley-required-message="@lang('web.field_required')" class="form-control" placeholder="@lang('web.phone')">
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input
                        type="password" name="password" id="pass1"
                        class="form-control" autocomplete="off"
                        placeholder="@lang('web.password')"
                        required
                        data-parsley-trigger="keyup"
                        data-parsley-required-message="@lang('web.field_required')"
                        data-parsley-maxlength="55"
                        data-parsley-minlength="6"
                        data-parsley-maxlength-message=" @lang('web.max_char_55')"
                        data-parsley-minlength-message=" @lang('web.min_char_6')"
                    >
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input
                        data-parsley-equalto="#pass1" name="password_confirmation" type="password" data-parsley-trigger="keyup"
                        placeholder="@lang('web.password_confirmation')" class="form-control"
                        autocomplete="off"
                        id="passWord2" required
                        data-parsley-required-message="@lang('web.field_required')"
                        data-parsley-equalto-message="@lang('web.pass_conf_not_equal')"
                        data-parsley-maxlength="55"
                        data-parsley-minlength="6"
                        data-parsley-maxlength-message=" @lang('web.max_char_55')"
                        data-parsley-minlength-message="@lang('web.min_char_6')"
                    >
                    <span class="focus-border"><i></i></span>
                </div>


                <div class="form-group">
                    <input type="text" name="licence_number" required data-parsley-required-message="@lang('web.field_required')" class="form-control" placeholder="@lang('web.comm_reg_no')">
                    <span class="focus-border"><i></i></span>
                </div>

                <div class="form-group">
                    <input type="number" name="commission" required
                                           data-parsley-required-message="@lang('web.field_required')"
                                           data-parsley-trigger="keyup"
                                           data-parsley-max="99"
                                           data-parsley-min="1"
                                           data-parsley-max-message="@lang('web.max_percent_99')"
                                           data-parsley-min-message="@lang('web.min_percent_1')"
{{--                                           data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
{{--                                           data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                           class="form-control" placeholder="@lang('web.app_percent_of_sales')">
                    <span class="focus-border"><i></i></span>
                </div>




                <div class="form-group">
                    <input id="uploadFile"  class="f-input form-control" placeholder="@lang('web.comm_reg_image')" />
                    <div class="fileUpload btn btn--browse">
                        <span>Browse</span>
                        <input id="uploadBtn" type="file" required data-parsley-required-message="@lang('web.field_required')" name="licence_image" class="upload" />
                    </div>
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
                
<!--
                        <input id="pac-input" name="address" required value="{{ old('address') }}"
                               data-parsley-required-message="@lang('web.address_required')"
                               class="controls"
                               type="text"
                               style="z-index: 0;position: absolute;top: 11px;left: 113px;height: 34px;width: 63%;"
                               placeholder="@lang('web.search_your_location')">

                        @if($errors->has('address'))
                            <p class="help-block error">
                                {{ $errors->first('address') }}
                            </p>
                        @endif

                <div id="map" style="width: 100%; height: 450px;"></div>
                <input type="hidden" name="lat" id="lat"/>
                <input type="hidden" name="lng" id="lng"/>
-->

<!--                <button type="submit"  class="upload">@lang('web.register_as_supplier')</button>-->
                <a class="submitting" href="{{route('supplier.home')}}"  class="upload">@lang('web.login_as_supplier')</a>



                {{--                <button type="button" data-toggle="modal" data-target="#signModal" class="submit-in">--}}
                {{--                    <i class="fas fa-arrow-right"></i>--}}
                {{--                </button>--}}


                {{--   Modals Buttons--}}

{{--                <button type="button" data-toggle="modal" data-target="#signModal" class="submit-in">--}}
{{--                    <i class="fas fa-arrow-right"></i>--}}
{{--                </button>--}}

            </form>

        </div>


    </div>
</section>
<!-- End sign-up -->

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
