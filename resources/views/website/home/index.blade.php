@extends('website.layouts.master')

@section('styles')

@endsection

@section('content')
    <!-- Start Header -->
    <section class="header" id="header">
        <div class="conatiner">

            <!--Start Carousel-->
            <div class="slide">
                <div id="owl-demo" class="owl-carousel owl-theme">

                    <div class="item">
                        <div class="carousel-caption">
                            <p class="lead wow slideInDown">
                                ستجد جميع قطع الغيار الجديدة والمستعملة لدى سيارتك
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slide1.png')}}">
                        </div>
                    </div>

                    <div class="item">
                        <div class="carousel-caption">
                            <p class="lead wow slideInDown">
                                ستجد جميع قطع الغيار الجديدة والمستعملة لدى سيارتك
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slider2.svg')}}">
                        </div>
                    </div>

                    <div class="item">
                        <div class="carousel-caption">
                            <p class="lead wow slideInDown">
                                ستجد جميع قطع الغيار الجديدة والمستعملة لدى سيارتك
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slider3.svg')}}">
                        </div>
                    </div>

                    <div class="item">
                        <div class="carousel-caption">
                            <p class="lead wow slideInDown">
                                ستجد جميع قطع الغيار الجديدة والمستعملة لدى سيارتك
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slider4.svg')}}">
                        </div>
                    </div>


                </div>

                <!-------------- Choose a car --------------------------------->
                <div class="choose-car">
                    <!--                    <h3>اختر سيارتك</h3>-->
                    <ul>
                        <li>
                            <img src="{{asset('website/img/car.svg')}}">
                        </li>
                        <li>
                            <img src="{{asset('website/img/sedan.svg')}}">
                        </li>
                        <li>
                            <img src="{{asset('website/img/car1.svg')}}">
                        </li>
                        <li>
                            <img src="{{asset('website/img/car4.svg')}}">
                        </li>
                    </ul>
                </div>

            </div>
            <!--End Carousel-->

        </div>
    </section>
    <!-- End Header -->


    <!-- Start Suggest -->
    <section class="suggests all-sections">
        <div class="container">
            <!--Start Carousel-->
            <!--            <div id="owl-suggest" class="owl-carousel owl-theme">-->
            <div class="row">
                <div class="new-row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="suggest">
                            <a data-fancybox="Gallery" data-caption="عنوان المقترح" href="{{asset('website/img/soon.png')}}" class="sgsting">
                                <img src="{{asset('website/img/soon.png')}}">
                            </a>
                            <form class="sgst-btns">
                                <button type="button" class="evl like"> <i class="fas fa-thumbs-up"></i> </button>
                                <button type="button" class="evl dislike"> <i class="fas fa-thumbs-down"></i> </button>
                                <button type="button" class="new-evl" data-toggle="modal" data-target="#myModal"> اضافة مقترح </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="suggest">
                            <a data-fancybox="Gallery" data-caption="عنوان المقترح" href="{{asset('website/img/soon.png')}}" class="sgsting">
                                <img src="{{asset('website/img/soon.png')}}">
                            </a>
                            <form class="sgst-btns">
                                <button type="button" class="evl like"> <i class="fas fa-thumbs-up"></i> </button>
                                <button type="button" class="evl dislike"> <i class="fas fa-thumbs-down"></i> </button>
                                <button type="button" class="new-evl" data-toggle="modal" data-target="#myModal"> اضافة مقترح </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="suggest">
                            <a data-fancybox="Gallery" data-caption="عنوان المقترح" href="{{asset('website/img/soon.png')}}" class="sgsting">
                                <img src="{{asset('website/img/soon.png')}}">
                            </a>
                            <form class="sgst-btns">
                                <button type="button" class="evl like"> <i class="fas fa-thumbs-up"></i> </button>
                                <button type="button" class="evl dislike"> <i class="fas fa-thumbs-down"></i> </button>
                                <button type="button" class="new-evl" data-toggle="modal" data-target="#myModal"> اضافة مقترح </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="suggest">
                            <a data-fancybox="Gallery" data-caption="عنوان المقترح" href="{{asset('website/img/soon.png')}}" class="sgsting">
                                <img src="{{asset('website/img/soon.png')}}">
                            </a>
                            <form class="sgst-btns">
                                <button type="button" class="evl like"> <i class="fas fa-thumbs-up"></i> </button>
                                <button type="button" class="evl dislike"> <i class="fas fa-thumbs-down"></i> </button>
                                <button type="button" class="new-evl" data-toggle="modal" data-target="#myModal"> اضافة مقترح </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="suggest">
                            <a data-fancybox="Gallery" data-caption="عنوان المقترح" href="{{asset('website/img/soon.png')}}" class="sgsting">
                                <img src="{{asset('website/img/soon.png')}}">
                            </a>
                            <form class="sgst-btns">
                                <button type="button" class="evl like"> <i class="fas fa-thumbs-up"></i> </button>
                                <button type="button" class="evl dislike"> <i class="fas fa-thumbs-down"></i> </button>
                                <button type="button" class="new-evl" data-toggle="modal" data-target="#myModal"> اضافة مقترح </button>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
            <!--End Carousel-->
        </div>
    </section>
    <!-- End Suggest -->


    <!-- Start Index -->
    <section class="index all-sections">
        <div class="container">
            <h2 class="h2-after"> كيفية الطلب </h2>

            <div class="ordering">
                <p>
                    لا تتردد امامك <span class="stp">4</span> خطوات بسيطة
                </p>
                <p>
                    رد مباشر من شركات قطع الغيار فى غضون <span class="stp">4</span> دقائق
                </p>
            </div>

            <a data-fancybox="Gallery" data-caption="كيفية الطلب" href="{{asset('website/img/index.png')}}" class="inx">
                <img src="{{asset('website/img/index.png')}}">
            </a>

            <a href="wizard-divider.html" class="apply"> البحث عن موزع </a>

        </div>
    </section>
    <!-- End Index -->

@endsection

@section('scripts')

@endsection
