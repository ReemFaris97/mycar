@extends('website.layouts.master')

@section('styles')
    <!-- This for here -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style1.css')}}">
    <script src="{{asset('website/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('website/js/respond.min.js')}}"></script>
@endsection

@section('content')


    <section class="TABS">
        <div class="container">
            <div class="row">
                @include('website.profile.side_menu')

                <div class="col-md-6 col-sm-8 col-xs-12 ">
                    <div class="left-tab">
                        <div class="tab-content">
                            <div class="modify">
                                <h3 class="h3-after">@lang('web.my_info')</h3>

                                <form action="{{route('web.profile.update')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                    <label>@lang('web.name')</label>
                                    <input type="text" name="name" value="{{optional($user)->name}}">
                                    @if($errors->has('name'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif

                                    <label>@lang('web.phone')</label>
                                    <input type="number" required  name="phone" value="{{optional($user)->phone}}">
                                    @if($errors->has('phone'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('phone') }}
                                        </p>
                                    @endif

                                    <label>@lang('web.location')</label>
                                    <div style="display: flex;align-items: center ; justify-content: space-between">


                                        <div>
                                            <input type="radio" value="inside" @if($user->region == 'inside') checked @endif name="region"  id="in-b">
                                            <label for="in-b">@lang('web.inside_b')</label>
                                        </div>
                                        <div>
                                            <input type="radio" value="outside" @if($user->region == 'outside') checked @endif name="region" id="out-b">
                                            <label for="out-b"> @lang('web.outside_b')</label>
                                        </div>

                                    </div>

                                    <label>اللوكيشن</label>
                                    <input id="pac-input" name="address" required value="{{ optional($user)->address }}"
                                           type="text"
                                           style="z-index: 0;position: absolute;top: 11px;left: 113px;height: 34px;width: 63%;"
                                           placeholder="@lang('web.search_in_map')">

                                    <div id="map" style="width: 100%; height: 450px;"></div>
                                    <input type="hidden" name="lat" id="lat" value="{{ optional($user)->lat }}" />
                                    <input type="hidden" name="lng" id="lng" value="{{ optional($user)->lng }}" />
                                    <input type="submit" value="@lang('web.edit')">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('scripts')

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

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".close").on('click' , function(){
                var id = $(this).data('id');
                var url = $(this).data('url');

                $.ajax({
                    type:'post',
                    url :url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        if(data.status == true){
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };

                            var $toast = toastr['success'](msg,title);
                            $toastlast = $toast;

                            $('#NotifyDiv'+id).remove();

                        }else {
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };

                            var $toast = toastr['error'](msg,title);
                            $toastlast = $toast
                        }
                    }
                });

            })
        })

    </script>

@endsection
