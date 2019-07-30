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

{{--                <div class="form-group">--}}
{{--                    <input id="uploadFile2" class="f-input form-control" placeholder="صورة المحل" />--}}
{{--                    <div class="fileUpload btn btn--browse">--}}
{{--                        <span>Browse</span>--}}
{{--                        <input id="uploadBtn2" type="file" class="upload" />--}}
{{--                    </div>--}}
{{--                    <span class="focus-border"><i></i></span>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <textarea rows="4" cols="95" class="form-control input-lg input-sm" data-fv-field="inbox" placeholder="اوصف العنوان"></textarea>--}}
{{--                    <span class="focus-border"><i></i></span>--}}
{{--                </div>--}}




{{--                    <label>اللوكيشن</label>--}}
{{--                    <div class="form-group">--}}
{{--                        <div id="mapholder"></div>--}}
{{--                        <input type="button" onclick="getLocation();" class="form-control" />--}}


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

{{--                </div>--}}

                <div id="map" style="width: 100%; height: 450px;"></div>
                <input type="hidden" name="lat" id="lat"/>
                <input type="hidden" name="lng" id="lng"/>



{{--                <div class="form-data">--}}
{{--                    <label>اللوكيشن</label>--}}
{{--                    <div class="form-group">--}}
{{--                        <div id="mapholder"></div>--}}
{{--                        <input type="button" onclick="getLocation();" class="form-control" />--}}
{{--                        <span class="focus-border"><i></i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <button type="submit"  class="upload">@lang('web.register_as_supplier')</button>
                <a href="{{route('supplier.home')}}"  class="upload">@lang('web.login_as_supplier')</a>



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
{{--<script>--}}
{{--    function showLocation(position) {--}}
{{--        var latitude = position.coords.latitude;--}}
{{--        var longitude = position.coords.longitude;--}}
{{--        var latlongvalue = position.coords.latitude + "," +--}}
{{--            position.coords.longitude;--}}
{{--        var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=" +--}}
{{--            latlongvalue + "&zoom=14&size=400x300&key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";--}}
{{--        document.getElementById("mapholder").innerHTML =--}}
{{--            "<img src='" + img_url + "'>";--}}
{{--    }--}}


{{--    function errorHandler(err) {--}}
{{--        if (err.code == 1) {--}}
{{--            alert("Error: Access is denied!");--}}
{{--        } else if (err.code == 2) {--}}
{{--            alert("Error: Position is unavailable!");--}}
{{--        }--}}
{{--    }--}}

{{--    function getLocation() {--}}
{{--        if (navigator.geolocation) {--}}
{{--            // timeout at 60000 milliseconds (60 seconds)--}}
{{--            var options = {--}}
{{--                timeout: 60000--}}
{{--            };--}}
{{--            navigator.geolocation.getCurrentPosition(showLocation, errorHandler, options);--}}
{{--        } else {--}}
{{--            alert("Sorry, browser does not support geolocation!");--}}
{{--        }--}}
{{--    }--}}

{{--</script>--}}

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
<script>


    function initAutocomplete() {

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.774265, lng: 46.738586},
            zoom: 8,
            mapTypeId: 'roadmap'
        });


        var marker;
        google.maps.event.addListener(map, 'click', function (event) {
            map.setZoom();
            var mylocation = event.latLng;
            map.setCenter(mylocation);


            $('#lat').val(event.latLng.lat());
            $('#lng').val(event.latLng.lng());


            codeLatLng(event.latLng.lat(), event.latLng.lng());

            setTimeout(function () {
                if (!marker)
                    marker = new google.maps.Marker({position: mylocation, map: map});
                else
                    marker.setPosition(mylocation);
            }, 600);

        });


        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });


        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();
            // var location = place.geometry.location;
            // var lat = location.lat();
            // var lng = location.lng();
            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];


            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                $('#lat').val(place.geometry.location.lat());
                $('#lng').val(place.geometry.location.lng());
                $('#address').val(place.formatted_address);

            });


            map.fitBounds(bounds);
        });

    }


    function showPosition(position) {

        map.setCenter({lat: position.coords.latitude, lng: position.coords.longitude});
        codeLatLng(position.coords.latitude, position.coords.longitude);


    }


    function codeLatLng(lat, lng) {

        var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(lat, lng);
        geocoder.geocode({
            'latLng': latlng
        }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    // console.log(results[1].formatted_address);
                    $("#demo").html(results[1].formatted_address);

                    $("#addressProfile").val(results[1].formatted_address);
                    $("#pac-input").val(results[1].formatted_address);

                } else {
                }
            } else {
                alert('Geocoder failed due to: ' + status);
            }
        });
    }



</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjBZsq9Q11itd0Vjz_05CtBmnxoQIEGK8&language=ar&libraries=places&callback=initAutocomplete"
        async defer></script>


<script src="{{asset('website/js/script.js')}}"></script>

</body>

</html>
