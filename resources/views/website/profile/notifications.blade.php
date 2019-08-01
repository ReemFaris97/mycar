@extends('website.layouts.master')

@section('styles')
    <!-- This for here -->


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

                <div class="col-md-10 col-sm-8 col-xs-12">
                    <div class="left-tab">
                        <div class="tab-content">

                            <div class="notifiction">
                                <h3 class="h3-after">الاشعارات
                                    <!--
                                    <span class="span1"></span>
                                    <span class="span2"></span>
                                    -->
                                </h3>


                                @forelse($notifications as $notify)
                                    <div class="notice">
                                        <button type="button" class="close">×</button>
                                        <img src="{{asset('website/img/bell.svg')}}">
                                        <h4>{{$notify->title()}}</h4>
                                        <a href="#"> لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>
                                    </div>
                                    @empty

                                @endforelse


{{--                                <div class="notice">--}}
{{--                                    <button type="button" class="close">×</button>--}}
{{--                                    <img src="{{asset('website/img/bell.svg')}}">--}}
{{--                                    <a href="#">لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>--}}
{{--                                </div>--}}

{{--                                <div class="notice back-gr">--}}
{{--                                    <button type="button" class="close">&times;</button>--}}
{{--                                    <img src="{{asset('website/img/bell.svg')}}">--}}
{{--                                    <a href="#"> لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>--}}
{{--                                </div>--}}
{{--                                <div class="notice back-gr">--}}
{{--                                    <button type="button" class="close">&times;</button>--}}
{{--                                    <img src="{{asset('website/img/bell.svg')}}">--}}
{{--                                    <a href="#"> لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>--}}
{{--                                </div>--}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{asset('website/')}}

@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            $(".close").on('click' , function(){
                $(this).parents('.notice').remove();
            })
        })

    </script>

@endsection
