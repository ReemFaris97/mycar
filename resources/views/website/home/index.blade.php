@extends('website.layouts.master')

@section('styles')
    <style>
        .parsley-error , .parsley-errors-list {
            color: red;
        }
    </style>
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
                                @lang('web.find_new_and_spare_parts')
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slide1.png')}}">
                        </div>
                    </div>

                    <div class="item">
                        <div class="carousel-caption">
                            <p class="lead wow slideInDown">
                                @lang('web.find_new_and_spare_parts')
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slide2.png')}}">
                        </div>
                    </div>

                    <div class="item">
                        <div class="carousel-caption">
                            <p class="lead wow slideInDown">
                                @lang('web.find_new_and_spare_parts')
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slide1.png')}}">
                        </div>
                    </div>

                    <div class="item">
                        <div class="carousel-caption">
                            <p class="lead wow slideInDown">
                                @lang('web.find_new_and_spare_parts')
                            </p>
                        </div>
                        <div class="slide-left">
                            <img src="{{asset('website/img/slide2.png')}}">
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

                    @forelse($proposals as $prop)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="suggest">
                            <a data-fancybox="Gallery" data-caption="{{$prop->name()}}" href="{{getimg($prop->image)}}" class="sgsting">
                                <img src="{{getimg($prop->image)}}">
                            </a>

                            <form class="sgst-btns">

                                <button type="button" class="evl like" data-propId="{{$prop->id}}" > <i class="fas fa-thumbs-up"></i> </button>
                                <button type="button" class="evl dislike" data-propId="{{$prop->id}}" > <i class="fas fa-thumbs-down"></i> </button>

                                <button  data-proposalId="{{$prop->id}}" type="button" class="new-evl AddCommentButton" data-toggle="modal" data-target="#CommentModal"> @lang('web.add_suggest') </button>
                            </form>

                        </div>
                    </div>
                    @empty
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="suggest">
                                <a data-fancybox="Gallery" data-caption="@lang('web.suggest_title')" href="{{asset('website/img/soon.png')}}" class="sgsting">
                                    <img src="{{asset('website/img/soon.png')}}">
                                </a>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
            <!--End Carousel-->
        </div>
    </section>
    <!-- End Suggest -->


    <!-- Start Index -->
    <section class="index all-sections">
        <div class="container">
            <h2 class="h2-after">@lang('web.how_to_order') </h2>

            <div class="ordering">
                <p>
                    @lang('web.dont_hesitate') <span class="stp">4</span> @lang('web.simple_steps')
                </p>
                <p>
                    @lang('web.direct_reply') <span class="stp">4</span> @lang('web.minutes')
                </p>
            </div>

            <a data-fancybox="Gallery" data-caption="@lang('web.how_to_order')" href="{{asset('website/img/index.png')}}" class="inx">
                <img src="{{asset('website/img/index.png')}}">
            </a>

            <a href="wizard-divider.html" class="apply"> @lang('web.search_supplier') </a>

        </div>
    </section>
    <!-- End Index -->
    <!----------------- Start Suggest Modal -------------------->

    <div id="CommentModal"  class="modal fade suggest-mdl" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    <h4 class="modal-title">@lang('web.add_suggest')</h4>
                </div>

                <form data-parsley-validate novalidate id="CommentForm" method="post" action="{{route('web.suggest.comment')}}">
                        {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="comment" required data-parsley-required-message="@lang('web.field_required')" rows="4" cols="95" class="form-control input-lg" data-fv-field="inbox" placeholder="@lang('web.write_suggest')"></textarea>
                        <input type="hidden" name="user_id" value="3">
                    </div>
                    <div class="modal-footer">
                        <button id="commentSubmitButton" type="submit" data-dismiss="modal">@lang('web.send')</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <!----------------- End Suggest Modal -------------------->

@endsection

@section('scripts')



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.AddCommentButton').on('click',function(e) {
            var id = $(this).attr('data-proposalId');

            $('<input>').attr({
                type: 'hidden',
                id: 'foo',
                name: 'proposal_id',
                value:id,
            }).appendTo('#CommentForm');

            $('#CommentModal').on('hidden.bs.modal', function () {
                $("#CommentForm #foo").remove();
            });

        });


        $('#CommentForm').on('submit', function (e) {

            e.preventDefault();
            var form = $(this);
            form.parsley().validate();
            if (form.parsley().isValid()) {
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        if (data.status === true) {

                            $('#CommentModal').modal('toggle');
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };
                            var $toast = toastr['success'](msg,title);
                            $toastlast = $toast;
                            $('#CommentForm').each(function () {
                                this.reset();
                            });


                        } else {
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };
                            var $toast = toastr['error'](msg,title);
                            $toastlast = $toast;

                        }
                    },
                    error: function (data) {

                    }
                });
            }
        });



    </script>



@endsection
