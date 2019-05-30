@extends('admin.layout.master')
@section('title','تعديل المورد')

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
                <a href="{{route('suppliers.index')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light" >رجوع لإدارة الموردين<span class="m-l-5"><i class="fa fa-reply"></i></span></a>
            </div>
            <h4 class="page-title">تعديل المورد</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">بيانات المورد: {{$supplier->name}}</h4>

                <div class="row">

                    <form method="post" action="{{route('suppliers.update',$supplier->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">الإسم*</label>--}}
                                <div class="col-md-10">
                                    <input type="text" required value="{{$supplier->name}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="name" class="form-control" placeholder="إسم المورد">

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
                                {{--<label class="col-md-2 control-label">رقم الجوال*</label>--}}
                                <div class="col-md-10">
                                    <input type="number" required value="{{$supplier->phone}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="10"
                                           data-parsley-maxlength-message="أقصى عدد ارقام هو 10 ارقام"
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">كلمة السر*</label>--}}
                                <div class="col-md-10">
                                    <input type="password" name="password" id="pass1" value="{{ old('password') }}"
                                           class="form-control"
                                           autocomplete="off"
                                           placeholder="كلمة المرور ..."
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="55"
                                           data-parsley-minlength="6"
                                           data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"
                                           data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف"
                                    />
                                    @if($errors->has('password'))
                                        <p class="help-block">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">تأكيد كلمة السر*</label>--}}
                                <div class="col-md-10">
                                    <input data-parsley-equalto="#pass1" name="password_confirmation" type="password" data-parsley-trigger="keyup"
                                           placeholder="تأكيد كلمة المرور ..." class="form-control"
                                           autocomplete="off"
                                           id="passWord2"
                                           data-parsley-equalto-message="تأكيد كلمة المرور غير متطابقة"
                                           data-parsley-maxlength="55"
                                           data-parsley-minlength="6"
                                           data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"
                                           data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف">

                                    @if($errors->has('password_confirmation'))
                                        <p class="help-block erro">
                                            {{ $errors->first('password_confirmation') }}
                                        </p>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">رقم السجل التجاري*</label>--}}
                                <div class="col-md-10">
                                    <input type="number" required value="{{$supplier->licence_number}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="25"
                                           data-parsley-maxlength-message="أقصى عدد ارقام هو 25 رقم"
                                           {{--data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
                                           {{--data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                                           {{--oninput="this.value = Math.abs(this.value)"--}}
                                           name="licence_number" class="form-control" placeholder=" رقم السجل التجاري">
                                    @if($errors->has('licence_number'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('licence_number') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">رقم السجل التجاري*</label>--}}
                                <div class="col-md-10">
                                    <input type="number" required value="{{$supplier->commission}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-max="99"
                                           {{--data-parsley-min="1"--}}
                                           data-parsley-max-message="اقصى نسبة هي 99"
                                           {{--data-parsley-min-message="اقل نسبة هي 1"--}}
                                           {{--data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
                                           {{--data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                                           oninput="this.value = Math.abs(this.value)"
                                           name="commission" class="form-control" placeholder="نسبة التطبيق من المبيعات">
                                    @if($errors->has('commission'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('commission') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">رقم السجل التجاري*</label>--}}
                                <div class="col-md-10">
                                    <input name="licence_image" type="file" class="dropify" data-max-file-size="6M"
                                           data-allowed-file-extensions="png gif jpg jpeg"
                                           data-errors-position="inside"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-show-remove="false"
                                           data-default-file="{{getimg($supplier->licence_image)}}"
                                    />

                                    @if ($errors->has('licence_image'))
                                        <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('licence_image') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>




                        {{--*******************************************************************--}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">العنوان*</label>
                                <div class="col-md-10">
                                    <input id="pac-input" name="address" required value="{{ $supplier->address }}"
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
                        <input type="hidden" name="lat" id="lat" value="{{ $supplier->lat }}" />
                        <input type="hidden" name="lng" id="lng" value="{{ $supplier->lng }}" />
                        {{--<input type="hidden" name="address" id="address" />--}}



                        {{-- buttons --}}
                        <div class="col-lg-12">
                            <div class="form-group text-right m-t-20">
                                <button class="btn btn-primary waves-effect waves-light m-t-20" id="btnSubmit" type="submit">
                                    تعديل
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
        // Date Picker
        jQuery('#datepicker').datepicker();


        $('.dropify').dropify({
            messages: {
                'default': 'إضغط هنا او اسحب وافلت صورة السجل التجاري',
                'replace': 'إسحب وافلت او إضغط للتعديل',
                'remove': 'حذف',
                'error': 'حدث خطأ ما'
            },
            error: {
                'fileSize': 'حجم الصورة كبير (6M max).',
                'fileExtension': 'نوع الصورة غير مدعوم (png - gif - jpg - jpeg)',
            }
        });


    </script>
    <script type="text/javascript">



        function initAutocomplete() {


            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.686246996081948, lng: 46.66859652100288},
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
            // Listen for the event fired when the supplier selects a prediction and retrieve
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


        {{--$(".company_name").attr({--}}
        {{--"data-parsley-trigger": "focusout",--}}
        {{--"data-parsley-required-message": "<?php __('trans.field_required') ?>",--}}
        {{--"data-parsley-maxlength": "15",--}}
        {{--"data-parsley-maxlength-message": "تجاوزت الحد الأقصى لعدد الحروف المسموحة وهى 15 ",--}}
        {{--"data-parsley-minlength": "3",--}}
        {{--"data-parsley-minlength-message": "اقل عدد حروف مسموح به هو 3 حروف"--}}

        {{--});--}}


        {{--@include('validate')--}}

    </script>
    <script>





        var lat = 24.774265;
        var lng = 46.738586;


        var newLat = $("#lat").val();
        var newLng = $("#lng").val();


        if (newLat != '' && newLng != '') {
            lat = Number(newLat);
            lng = Number(newLng);
        }


        function initAutocomplete() {


            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: lat, lng: lng},
                zoom: 8,
                mapTypeId: 'roadmap'
            });

            var mylocation = {lat: lat, lng:lng};

            var marker;

            google.maps.event.addListener(map, 'click', function (event) {
                map.setZoom();
                var mylocation = event.latLng;
                map.setCenter(mylocation);



                $('#lat').val(event.latLng.lat());
                $('#lng').val(event.latLng.lng());


                // marker = new google.maps.Marker({position: mylocation, map: map});

                codeLatLng(event.latLng.lat(), event.latLng.lng());

                setTimeout(function () {
                    if (!marker)
                        marker = new google.maps.Marker({position: mylocation, map: map});
                    else
                        marker.setPosition(mylocation);
                }, 600);

            });

            marker = new google.maps.Marker({position: mylocation, map: map});




            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });


            var markers = [];
            // Listen for the event fired when the supplier selects a prediction and retrieve
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
