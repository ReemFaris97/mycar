@extends('admin.layout.master')
@section('title','إنشاء مستخدم جديد')

@section('styles')
    <style>
        .erro{
            color: red;
        }
    </style>
@endsection

@section('content')
    <!-- Page Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{route('users.index')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light" >رجوع لإدارة المستخدمين<span class="m-l-5"><i class="fa fa-reply"></i></span></a>
            </div>
            <h4 class="page-title">إضافة مستخدم جديد</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">


                <h4 class="header-title m-t-0 m-b-30">بيانات المستخدم</h4>

                <div class="row">

                    <form method="post" action="{{route('users.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">الإسم*</label>
                                <div class="col-md-10">
                                    <input type="text"
                                           value="{{old('name')}}"
                                           {{-- required --}}
{{--                                           data-parsley-required-message="هذا الحقل مطلوب"--}}
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="name" class="form-control" placeholder="إسم المستخدم">

                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">رقم الجوال*</label>
                                <div class="col-md-10">
                                    <input type="number" required value="{{old('phone')}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="10"
                                           data-parsley-maxlength-message="أقصى عدد ارقام هو 10 حرف"
                                           {{--data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
                                           {{--data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                                           {{--oninput="this.value = Math.abs(this.value)"--}}
                                           name="phone" class="form-control" placeholder="رقم الجوال">
                                    @if($errors->has('phone'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('phone') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{--******************************************************************--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="col-md-2 control-label">كلمة السر*</label>--}}
{{--                                <div class="col-md-10">--}}
{{--                                    <input type="password" name="password" id="pass1" value="{{ old('password') }}"--}}
{{--                                           class="form-control" autocomplete="off"--}}
{{--                                           placeholder="كلمة السر ..."--}}
{{--                                           required--}}
{{--                                           data-parsley-trigger="keyup"--}}
{{--                                           data-parsley-required-message="كلمة المرور مطلوبة"--}}
{{--                                           data-parsley-maxlength="55"--}}
{{--                                           data-parsley-minlength="6"--}}
{{--                                           data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"--}}
{{--                                           data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف"--}}
{{--                                    />--}}
{{--                                    @if($errors->has('password'))--}}
{{--                                        <p class="help-block">--}}
{{--                                            {{ $errors->first('password') }}--}}
{{--                                        </p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="col-md-2 control-label">تأكيد كلمة السر*</label>--}}
{{--                                <div class="col-md-10">--}}
{{--                                    <input data-parsley-equalto="#pass1" name="password_confirmation" type="password" data-parsley-trigger="keyup"--}}
{{--                                           placeholder="تأكيد كلمة المرور ..." class="form-control"--}}
{{--                                           autocomplete="off"--}}
{{--                                           id="passWord2" required--}}
{{--                                           data-parsley-required-message="تأكيد كلمة المرور مطلوب"--}}
{{--                                           data-parsley-equalto-message="تأكيد كلمة المرور غير متطابقة"--}}
{{--                                           data-parsley-maxlength="55"--}}
{{--                                           data-parsley-minlength="6"--}}
{{--                                           data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"--}}
{{--                                           data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف">--}}

{{--                                    @if($errors->has('password_confirmation'))--}}
{{--                                        <p class="help-block erro">--}}
{{--                                            {{ $errors->first('password_confirmation') }}--}}
{{--                                        </p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        {{--*******************************************************************--}}

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">العنوان*</label>
                                <div class="col-md-10">
                                    <input id="pac-input" name="address" required value="{{ old('address') }}"
                                           data-parsley-required-message="@lang('web.field_required')"
                                           class="controls"
                                           type="text"
                                           style="z-index: 0;position: absolute;top: 11px;left: 113px;height: 34px;width: 63%;"
                                           placeholder="ابحث عن عنوان او حدد موقعك على الخريطة">

                                    @if($errors->has('address'))
                                        <p class="help-block error">
                                            {{ $errors->first('address') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div id="map" style="width: 100%; height: 450px;"></div>
                        <input type="hidden" name="lat" id="lat"/>
                        <input type="hidden" name="lng" id="lng"/>
                        {{-- buttons --}}
                        <div class="col-lg-12">
                            <div class="form-group text-right m-t-20">
                                <button class="btn btn-primary waves-effect waves-light m-t-20" id="btnSubmit" type="submit">
                                    تسجيل
                                </button>
                                <button onclick="window.history.back();return false;" type="reset"
                                        class="btn btn-default waves-effect waves-light m-l-5 m-t-20">
                                    إلغاء
                                </button>
                            </div>
                        </div>

                    </form>


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
@section('scripts')
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



@endsection
