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
                                <h3 class="h3-after">@lang('web.my_info')
                                    <!--
                            <span class="span1"></span>
                            <span class="span2"></span>
                                    -->
                                </h3>
                                <h4>@lang('web.personal_info')</h4>
                                <ul>
                                    <li>@lang('web.name') :
                                        <span class="name-account"> {{optional($user)->name}}</span>
                                    </li>
                                    <li>@lang('web.phone') :
                                        <span class="phone-number">{{$user->phone}}</span>
                                    </li>

                                    <li> @lang('web.address') :
                                        <span class="place">{{optional($user)->address}}</span>
                                    </li>
                                    <li>
                                        <a href="{{route('web.profile.edit')}}">@lang('web.edit')</a>
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
