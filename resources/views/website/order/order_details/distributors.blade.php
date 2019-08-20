@extends('website.layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.foundation.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.uikit.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables_themeroller.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <style>
        .parsley-errors-list{
            color: red;
        }
    </style>

@endsection

@section('content')
    <section class="all-sections">
        <div class="container">
            <button type="button" class="delt-all">إلغاء الطلب</button>
            <h3 class="h3-after">الأسعار</h3>
            <a href="#" class="trn">سياسة الإرجاع</a>
            <div class="the-distrb">
                <b>الموزع : <h4>{{$order->supplier->name}}</h4></b>

                <div class="tfasel">
                    <div class="tools"></div>
                    <b><h4>تفاصيل الطلب</h4></b>
                    <table class="mytable">
                        <thead>
                        <tr>
                            <th>م</th>
                            <th>اسم القطعة</th>
{{--                            <th>قيمة القطعة</th>--}}
                            <th>الكمية</th>
{{--                            <th>الإجمالى</th>--}}
                            <th>صورة القطعة</th>
{{--                            <th>حذف</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($order->order_details as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->part->name()}}</td>
{{--                            <td>300 ريال</td>--}}
                            <td>{{$row->quantity}}</td>
{{--                            <td> 315 ريال </td>--}}
                            <td><img src="{{getimg($row->part->image)}}"></td>
{{--                            <td> <button class="close"> <i class="fas fa-times"></i> </button> </td>--}}
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <b><h4>قائمة التسعير</h4></b>
                    <table class="mytable">
                        <thead>
                        <tr>
                            <th>م</th>
                            <th>اسم القطعة</th>
                            <th>قيمة القطعة</th>
                            <th>الكمية</th>
                            <th>الإجمالى</th>
                            <th>صورة القطعة</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>صدام أمامى فوق</td>
                            <td>300 ريال</td>
                            <td>1</td>
                            <td> 315 ريال </td>
                            <td><img src="{{asset('website/img/logo.png')}}"></td>
                            <td> <button class="close"> <i class="fas fa-times"></i> </button> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>صدام خلفى</td>
                            <td>400 ريال</td>
                            <td>5</td>
                            <td> 840 ريال </td>
                            <td><img src="{{asset('website/img/logo.png')}}"></td>
                            <td> <button class="close"> <i class="fas fa-times"></i> </button> </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>سقف أمامى</td>
                            <td>600 ريال</td>
                            <td>3</td>
                            <td> 700 ريال </td>
                            <td><img src="{{asset('website/img/logo.png')}}"></td>
                            <td> <button class="close"> <i class="fas fa-times"></i> </button> </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <form data-parsley-validate novalidate action="" method="get" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="sha7n">
                <h3 class="h3-after">الشحن</h3>



                <div class="deliver">
                    <div class="radio-list dist-list">

                        <label class="rad" id="from-shop">
                            <div class="checking">
                                <span class="check-img">
                                    <img src="{{asset('website/img/deliver1.svg')}}">
                                </span>
                                توصيل القطع إلى ( الورشة - البنشر - المنزل - مكان العمل ) </div>
                            <input type="radio" checked="checked" name="chkPinNo" id="chk1">
                            <span class="checkmark"></span>
                        </label>




                        <label class="rad" id="from-home">
                            <div class="checking">
                                <span class="check-img">
                                    <img src="{{asset('website/img/deliver2.svg')}}">
                                </span>
                                الإستلام من الوكالة ( لتكون القطع جاهزة وخيارات الدفع متعددة )
                            </div>
                            <input type="radio" name="chkPinNo">
                            <span class="checkmark"></span>
                            <!--                            <a href="payment.html" class="trn">ادفع هنا</a>-->
                        </label>

                        <div class="maps">

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


{{--                            <div class="map1" id="div1">--}}


{{--                                <input id="pac-input" class="controls form-control from-shop-input" type="text" placeholder="البحث عن ..">--}}
{{--                                <div id="map" class="from-shop"></div>--}}

{{--                                <div class="form-data">--}}
{{--                                    <label>وصف العنوان</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <textarea required data-parsley-required-message="هذا الحقل مطلوب" id="address_description" rows="4" cols="95" class="form-control input-lg" placeholder="اوصف العنوان"></textarea>--}}
{{--                                        <span class="focus-border"><i></i></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>


                            <div class="map2" id="div2">
                                <div class="form-data">
                                    <div class="form-group">
                                        <div id="temp" class="from-home"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <button type="submit" class="delt-all">ادفع هنا</button>

                </div>

            </div>
            </form>
        </div>
    </section>

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $(".close").click(function() {
                $(this).closest("tr").fadeOut(500);
            });
        });

    </script>
    <!--------- Data Table ---------------->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.foundation.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.uikit.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('admin/assets/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('form').parsley();
            $('.mytable').DataTable({
                responsive: true
            });
        });

    </script>


    <!-------------- Map ------------------------>

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



{{--    <script type="text/javascript">--}}
{{--        // When the window has finished loading create our google map below--}}

{{--        //        google.maps.event.addDomListener(window, 'load', init);--}}

{{--        function initAutocomplete() {--}}

{{--//            "use strict";--}}


{{--            var map = new google.maps.Map(document.getElementById('map'), {--}}
{{--                center: {lat: 59.325, lng: 18.067},--}}
{{--                zoom: 13,--}}
{{--                mapTypeId: 'roadmap'--}}
{{--            });--}}



{{--//            var mapOptions = {--}}
{{--//                scrollwheel: false,--}}
{{--//                zoom: 13,--}}
{{--//                                    marker: marker,--}}
{{--//--}}
{{--//                center: {--}}
{{--//                    lat: 59.325,--}}
{{--//                    lng: 18.067--}}
{{--//                },--}}
{{--//            };--}}
{{--//--}}
{{--//            var map = new google.maps.Map(document.getElementById('map'), mapOptions);--}}






{{--            var input = document.getElementById('pac-input');--}}
{{--            var searchBox = new google.maps.places.SearchBox(input);--}}
{{--            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);--}}

{{--            // Bias the SearchBox results towards current map's viewport.--}}
{{--            map.addListener('bounds_changed', function() {--}}
{{--                searchBox.setBounds(map.getBounds());--}}
{{--            });--}}

{{--            var markers = [];--}}
{{--            // Listen for the event fired when the user selects a prediction and retrieve--}}
{{--            // more details for that place.--}}
{{--            searchBox.addListener('places_changed', function() {--}}
{{--                var places = searchBox.getPlaces();--}}

{{--                if (places.length == 0) {--}}
{{--                    return;--}}
{{--                }--}}

{{--// Clear out the old markers.--}}
{{--                markers.forEach(function(marker) {--}}
{{--                    marker.setMap(null);--}}
{{--                });--}}
{{--                markers = [];--}}

{{--// For each place, get the icon, name and location.--}}
{{--                var bounds = new google.maps.LatLngBounds();--}}
{{--                places.forEach(function(place) {--}}
{{--                    if (!place.geometry) {--}}
{{--                        console.log("Returned place contains no geometry");--}}
{{--                        return;--}}
{{--                    }--}}
{{--                    var icon = {--}}
{{--                        url: place.icon,--}}
{{--                        size: new google.maps.Size(71, 71),--}}
{{--                        origin: new google.maps.Point(0, 0),--}}
{{--                        anchor: new google.maps.Point(17, 34),--}}
{{--                        scaledSize: new google.maps.Size(25, 25)--}}
{{--                    };--}}

{{--                    // Create a marker for each place.--}}
{{--                    markers.push(new google.maps.Marker({--}}
{{--                        map: map,--}}
{{--                        icon: icon,--}}
{{--                        title: place.name,--}}
{{--                        position: place.geometry.location,--}}
{{--                        draggable: true,--}}
{{--                        animation: google.maps.Animation.DROP,--}}
{{--                    }));--}}

{{--                    if (place.geometry.viewport) {--}}
{{--                        // Only geocodes have viewport.--}}
{{--                        bounds.union(place.geometry.viewport);--}}
{{--                    } else {--}}
{{--                        bounds.extend(place.geometry.location);--}}
{{--                    }--}}
{{--                });--}}
{{--                map.fitBounds(bounds);--}}
{{--            });--}}



{{--//                var marker = new google.maps.Marker({--}}
{{--//                map: map,--}}
{{--//                draggable: true,--}}
{{--//                icon: 'img/flag-map-marker.png',--}}
{{--//                title: 'قطعة سيارتى',--}}
{{--//                animation: google.maps.Animation.DROP,--}}
{{--//                position: {--}}
{{--//                    lat: 59.325,--}}
{{--//                    lng: 18.067--}}
{{--//                }--}}
{{--//            });--}}
{{--//            marker.addListener('click', toggleBounce);--}}

{{--            $("#from-home").click(function() {--}}
{{--                $("#map").attr("id", "temp");--}}
{{--                $(".from-home").attr("id", "map");--}}
{{--                $("#pac-input").attr("id", "temp-input");--}}
{{--                $(".from-home-input").attr("id", "pac-input");--}}
{{--                var map = new google.maps.Map(document.getElementById('map'), {--}}
{{--                    center: {lat: 59.325, lng: 18.067},--}}
{{--                    zoom: 13,--}}
{{--                    mapTypeId: 'roadmap'--}}
{{--                });--}}
{{--                var input = document.getElementById('pac-input');--}}
{{--                var searchBox = new google.maps.places.SearchBox(input);--}}
{{--                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);--}}
{{--                var marker = new google.maps.Marker({--}}
{{--                    map: map,--}}
{{--                    icon: 'img/flag-map-marker.png',--}}
{{--                    title: 'قطعة سيارتى',--}}
{{--                    position: {--}}
{{--                        lat: 59.325,--}}
{{--                        lng: 18.067--}}
{{--                    }--}}
{{--                });--}}

{{--            });--}}

{{--            $("#from-shop").click(function() {--}}
{{--                $("#map").attr("id", "temp");--}}
{{--                $(".from-shop").attr("id", "map");--}}
{{--                $("#pac-input").attr("id", "temp-input");--}}
{{--                $(".from-home-input").attr("id", "pac-input");--}}
{{--            });--}}

{{--        }--}}

{{--        function toggleBounce() {--}}
{{--            if (marker.getAnimation() !== null) {--}}
{{--                marker.setAnimation(null);--}}
{{--            } else {--}}
{{--                marker.setAnimation(google.maps.Animation.BOUNCE);--}}
{{--            }--}}
{{--        }--}}

{{--        //--}}
{{--        //            map.addListener('bounds_changed', function() {--}}
{{--        //                searchBox.setBounds(map.getBounds());--}}
{{--        //            });--}}





{{--    </script>--}}

{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi7RVqBGvLWMhmV_uv81zZ2Iv1ZvWOT9M&libraries=places&callback=initAutocomplete" async defer></script>--}}

    <!--------- Deliver Button ----------->
    <script>
        $(document).ready(function() {

            $(function() {
                $('#temp-input').attr('required','required');
                $("input[name='chkPinNo']").click(function() {
                    if ($("#chk1").is(":checked")) {
                        $("#div1").show();
                        $("#div2").hide();
                        $('#address_description').attr('required','required');
                        $('#address_description').attr('data-parsley-required-message','هذا الحقل مطلوب');
                        $('#temp-input').attr('required','required');
                    } else {
                        $("#div1").hide();
                        $("#div2").show();
                        $('#address_description').removeAttr('required');
                        $('#temp-input').removeAttr('required');
                    }
                });
            });

        });

    </script>

@endsection
