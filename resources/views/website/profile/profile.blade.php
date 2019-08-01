@extends('website.layouts.master')

@include('website.profile.profile_styles')
@section('styles')

@endsection

@section('content')


    <section class="TABS" id="section1">
        <div class="container">
            <div class="row">

              @include('website.profile.side_menu')


                <div class="col-md-10 col-sm-8 col-xs-12 ">
                    <div class="left-tab">
                        <div class="tab-content">
                            <div id="home" class="in active">
                                <h3 class="h3-after">معلوماتى
                                    <!--
                            <span class="span1"></span>
                            <span class="span2"></span>
                                    -->
                                </h3>
                                <h4>المعلومات الشخصية</h4>
                                <ul>
                                    <li>@lang('web.name') :
                                        <span class="name-account"> {{optional($user)->name}}</span>
                                    </li>
                                    <li>@lang('web.phone') :
                                        <span class="phone-number">{{$user->phone}}</span>
                                    </li>

                                    <!------- show   this in  user ------->
{{--                                    <li> رقم السجل التجاري :--}}
{{--                                        <span class="number-record">122</span>--}}
{{--                                    </li>--}}
{{--                                    <li> صورة السجل :--}}
{{--                                        <img class="img-record" src="{{asset('website/img/logo-sm.png')}}">--}}
{{--                                    </li>--}}
{{--                                    <li> صورة المحل :--}}
{{--                                        <img class="img-shop" src="{{asset('website/img/logo-sm.png')}}">--}}
{{--                                    </li>--}}
                                    <!------------------>

                                    <li> @lang('web.address') :
                                        <span class="place">{{optional($user)->address}}</span>
                                    </li>
                                    <li>
                                        <a href="modify.html">تعديل</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@include('website.profile.profile_scripts')

@section('scripts')

@endsection
