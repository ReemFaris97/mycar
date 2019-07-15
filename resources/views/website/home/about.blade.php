@extends('website.layouts.master')

@section('styles')

@endsection

@section('content')


    <!-- Start Contact -->
    <section class="contact all-sections" id="section1">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12">
                    <div class="who-right">
                        <h3 class="h3-after">من نحن</h3>

                        <p>
                            {!! getsetting('about') !!}
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5 col-sm-4 col-xs-12">
                    <div class="who-left">
                        <img src="{{asset('website/img/who-us.svg')}}">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Contact -->


@endsection

@section('scripts')

@endsection
