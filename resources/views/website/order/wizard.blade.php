@extends('website.layouts.master')

@section('styles')
    <style>
        .parsley-error , .parsley-errors-list {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="{{asset('website/css/jquery.fancybox.min.css')}}">



@endsection

@section('content')

    <section class="wizards">
        <div class="container">
            <div id="jquery-steps">
                <h3></h3>
                <section>
                    <button type="button" class="delt-all">إلغاء الطلب</button>

                    <h3 class="h3-after">إضافة سيارة</h3>


                    <form id="account-form" method="post" action="{{route('web.order.initiate')}}" novalidate="validate" >
                        {{csrf_field()}}
                        <input type="hidden" id="order_type_car" name="order_car_type" value="1" >


                        <div class="row">


                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="userName">اختيار الشركة</label>
                                    <div class="company-radio" id="company-radio">

                                        @foreach($companies as $company)
                                        <div class="rad1">
                                            <input type="radio" data-company-name="{{$company->name()}}" name="company_id" value="{{$company->id}}" id="choose-{{$loop->iteration}}" class="required" />
                                            <label for="choose-{{$loop->iteration}}" class="lbl1">
                                                <img src="{{getimg($company->image)}}" />
                                                <p>{{$company->name()}}</p>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>



                            <div class="up-tgle">

                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group custom-gp">
                                        <label>الموديل</label>

                                        <select name="company_model_id" class="js-select2" id="locationCodesSelect2">
                                        {{--  locationCodeSelect2 blade included here --}}

                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>السنة</label>
                                        <select  name="year" class="js-select2" id="ModelYears">
                                            {{--  ModelYears blade included here --}}

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="tgle col-xs-12 no-padding">
                                <div class="col-sm-8 col-xs-12">
                                    <div class="form-data">
                                        <label> ادخل رقم الهيكل أو ارفق صورة الاستمارة</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="structure_number" id="dwn-btn" />
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!--------- Image ----------->
                                <div class="col-sm-4 col-xs-12">
                                    <div class="profile-pic">
                                        <div class="images-upload-block photo">
                                            <label class="upload-img photo" for="upp-btn">
                                                <input type="file" id="upp-btn" accept="image/*" class="image-uploader form-control" name="form_image">
                                                <b><i class="fas fa-image"></i></b>
                                            </label>
                                        </div>
                                        <div class="images-upload-block" id="appended-pic"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <a class="to-tgle">
                                    <span class="text-up">
                                        ما لقيت سيارتك ؟ (ديزل - بنزين) - إرفق رقم الهيكل لتطابق القطع 100%
                                    </span>
                                    <span class="text-down">
                                        أدخل موديل السيارة أو السنة
                                    </span>
                                </a>
                            </div>
                        </div>
                    </form>


                </section>


                <h3></h3>
                <section>
                    <h3 class="h3-after">بيانات الطلب</h3>
<form id="orders-form" action="distributers.html" novalidate="validate">
                        <div class="col-xs-12">
                            <div class="form-group">
{{--                                --}}
{{--                                <label>السيارات السابقة</label>--}}
{{--                                <p class="model1">تويوتا كرولا 2019</p>--}}
{{--                                <p class="model1">تويوتا فورتشينر 2019</p>--}}
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>معلومات السيارة الحالية</label>
                                <p id="currentCar" class="dtls"></p>
                                <a href="#previous" role="menuitem" class="replace" id="goPrev"> تبديل السيارة </a>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="products">
                                <div id="the-choseen-parts"></div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <button type="button" class="btn-piece" data-toggle="modal" data-target="#name-piece" data-dismiss='modal'>
                                    اختر القطع بالاسم
                                    <i class="fas fa-text-height"></i>
                                </button>
                                <button type="button" class="btn-piece" data-toggle="modal" data-target="#img-piece" data-dismiss='modal'>
                                    اختر القطع بالصورة
                                    <i class="fas fa-image"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </section>


                <h3></h3>
                <section>
                    <button type="button" class="delt-all">إلغاء الطلب</button>
                    <h3 class="h3-after">الطلبات</h3>

                        <!--
                        <div class="row">
                            <label for="userName">User name *</label>
                            <input id="userName" name="userName" type="text" class="required">
                        </div>
-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">

{{--                                    <label>السيارات السابقة</label>--}}
{{--                                    <p class="model1">تويوتا كرولا 2019</p>--}}
{{--                                    <p class="model1">تويوتا فورتشينر 2019</p>--}}

                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>معلومات السيارة الحالية</label>
                                    <p id="currentCar2" class="dtls"></p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="products">
                                    <div id="the-choseen-parts"></div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="distributers">
                                    <h3 class="h3-after">البحث عن موزع</h3>
                                    <div class="radio-list">
                                        <label class="rad">أصلية
                                            <input value="original" type="radio" name="type-1" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="rad">تشليح
                                            <input value="used" type="radio" name="type-1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="rad">تجارية
                                            <input value="commercial" type="radio" name="type-1">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <b>
                                        المدينة :-
                                        @if(auth()->user()->region == "inside")
                                        <span>بريدة</span>
                                            @else
                                            <span>خارج بريدة</span>
                                        @endif
                                    </b>
                                    <b>
                                        اختر الموزع
                                    </b>
                                    <div class="radio-list dist-list">


{{--                                        <label class="rad">--}}
{{--                                            <div class="checking"> القصيم لتجارة قطع الغيار </div>--}}
{{--                                            <input class="required" type="radio" name="distributer" data-toggle="modal" data-target="#not-avl" data-dismiss='modal'>--}}
{{--                                            <span class="checkmark"></span>--}}
{{--                                            <span class="check-img">--}}
{{--                                                <img src="{{asset('website/img/logo.png')}}">--}}
{{--                                            </span>--}}
{{--                                            <b>مواعيد العمل :--}}
{{--                                                <span> السبت - الخميس , 9 صباحا - 11 مساءا </span>--}}
{{--                                            </b>--}}
{{--                                        </label>--}}

                                        @foreach(App\User::where('type','supplier')->get() as $user)
                                        <label class="rad">
                                            <div class="checking"> {{$user->name}} </div>
                                            <input class="required" type="radio" name="distributer">
                                            <span class="checkmark"></span>
                                            <span class="check-img">
                                                @if($user->image != null)
                                                    <img src="{{getimg($user->image)}}">
                                                @else
                                                    <img src="{{asset('website/img/logo.png')}}">
                                                @endif
                                            </span>
{{--                                            <b>مواعيد العمل :--}}
{{--                                                <span> السبت - الخميس , 9 صباحا - 11 مساءا </span>--}}
{{--                                            </b>--}}
                                        </label>
                                        @endforeach


                                        <label class="rad">
                                            <div class="checking"> القصيم لتجارة قطع الغيار </div>
                                            <input class="required" type="radio" name="distributer">
                                            <span class="checkmark"></span>
                                            <span class="check-img">
                                                <img src="{{asset('website/img/logo.png')}}">
                                            </span>
                                            <b>مواعيد العمل :
                                                <span> السبت - الخميس , 9 صباحا - 11 مساءا </span>
                                            </b>
                                        </label>


                                    </div>
                                </div>
                            </div>
                        </div>

                </section>
            </div>
        </div>
    </section>


            <!-- ------------------------------ Order Modals ---------------------------------------------- -->


               <!------------------------------- name-piece Modal -------------------------------------->
    <div class="modal fade modalIn" id="name-piece" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="h3-after">اختر القطع</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="navbar-form " role="search">
                        <div class="row">

                            <div class="col-xs-12">
                                <div class="form-data">
                                    <label>البحث بالاسم</label>
                                    <div class="form-group searchh">
                                        <input name="PartNameSearch" id="myInput" type="text" class="form-control" placeholder="بحث ...">
                                        <!--
                                        <button type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
-->
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <ul class="all-dtls" id="myList">
                                    @foreach($parts as $part)
                                    <li>
                                        <ul class="inDetails">
                                            <li>
                                                <label class="new-p">
                                                    <span class="name-p">{{$part->name()}}</span>
                                                    <input type="checkbox" class="if-check">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach

{{--                                    <li>--}}
{{--                                        <ul class="inDetails">--}}
{{--                                            <li>--}}
{{--                                                <label class="new-p">--}}
{{--                                                    <span class="name-p">رئيسى</span>--}}
{{--                                                    <input type="checkbox" class="if-check">--}}
{{--                                                    <span class="checkmark"></span>--}}
{{--                                                </label>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}

                                </ul>
                            </div>
                        </div>
                        <input class="fxd-btn" id="fxd-btn" type="submit" value="إتمام" data-dismiss='modal' disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>

               <!-----------------------------End  name-piece Modal --------------------------->





    <!-- image-piece Modal -->
    <div class="modal fade modalIn" id="img-piece" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="h3-after">اختر القطع بالصورة</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="navbar-form " role="search">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>قسم رئيسى</label>

                                    <select id="mainCategoriesSelect" class="js-select2" title="قسم رئيسى">
                                        <option selected disabled>إختار قسم رئيسي</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>قسم فرعى</label>
                                    <select id="subCategoriesSelect" class="js-select2">


                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="filtrtion" id="mainPartsImages">
                                {{--  Here is the main parts   --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- details Modal -->
    <div class="modal fade modalIn" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="PartNameModal" class="h3-after">اسم القطعة</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <section class="dtls-piece">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-xs-12">
                                <a id="mainPartImage-href" class="piece1" data-fancybox="Gallery" data-caption="اسم القطعة" href="{{asset('website/img/slide1.png')}}">
                                    <img id="mainPartImage-src" src="{{asset('website/img/slide1.png')}}">
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-9 col-xs-12">
                                <ol id="part-childrens" class="all-dtls">




                                </ol>
                            </div>
                        </div>
                        <input class="fxd-btn" id="fxd-btn" type="submit" value="إتمام" data-dismiss='modal' disabled>
                    </section>
                </div>
            </div>
        </div>

    </div>
    <!-- NOT AVALAIBLE Modal -->
    <div id="not-avl" class="modal fade suggest-mdl" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="logo-nav"><img src="{{asset('website/img/logo.png')}}"></div>
                <div class="choosing">
                    <p>
                        الموزع غير متاح حاليا سنذكرك عندما يكون متاح
                    </p>
                    <button type="submit" class="submit-in" data-dismiss='modal'> موافق </button>
                    <button type="submit" class="submit-in" data-dismiss='modal'>غير موافق </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- Start Form -->
    <!-- jQuery easing plugin -->
    <script src="{{asset('website/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('website/js/jquery.steps.js')}}" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#account-form').validate({
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
            $('#profile-form').validate();
            $('#form-1').validate();
            $('#jquery-steps').steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                onStepChanging: function(event, currentIndex, newIndex) {
                    if (newIndex < currentIndex) {
                        return true;
                    }
                    var form = $('.body.current form');
                    if (form.length == 1) {
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    }
                    return true;
                },
                onFinishing: function(event, currentIndex) {
                    var form = $('.body.current form');
                    if (form.length == 1) {
                        form.validate().settings.ignore = ":disabled";
                        return form.valid();
                    }
                    return true;
                },
                onFinished: function(event, currentIndex) {
                    //                    alert("Submitted!");
                }
            });
            $("a[href='#finish']").click(function() {
                $("#orders-form").submit();
            })


            //----------------------------------------------------------------------------------------------------
            //---------------------------------------    Added By ZAIN   -----------------------------------------
            //----------------------------------------------------------------------------------------------------


            // Ajax Code of Changeing Radio button value -- first wizard Form ....
            // account-form
            $(document).ready(function(){

                var carName,carModel,carYear;

                $('#company-radio input[type=radio]').change(function(){
                   var RadioCompanyValue = $("input[name='company_id']:checked").val();
                   carName = $("input[name='company_id']:checked").attr('data-company-name');

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('web.get.companyModels') }}',
                        data: {id: RadioCompanyValue},
                        dataType: 'json',
                        success: function (data) {
                            $('#locationCodesSelect2').html(data.data);
                        }
                    });
                });

                $('#locationCodesSelect2').change(function(){
                    var selectModelId = $(this).val();
                    carModel = $(this).find('option:selected').text();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('web.get.modelYears') }}',
                        data: {id: selectModelId},
                        dataType: 'json',
                        success: function (data) {
                            $('#ModelYears').html(data.data);
                        }
                    });
                });

                $('#ModelYears').change(function(){
                    carYear = $(this).find('option:selected').text();
                    $('#currentCar').text(carName+" "+ carModel+" "+carYear);
                    $('#currentCar2').text(carName+" "+ carModel+" "+carYear);
                });

                $('#mainCategoriesSelect').change(function(){
                    var id = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('web.get.subCategories') }}',
                        data: {id: id},
                        dataType: 'json',
                        success: function (data) {
                            $('#subCategoriesSelect').html(data.data);
                        }
                    });
                });

                $('#subCategoriesSelect').change(function(){
                    var id = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('web.get.mainParts') }}',
                        data: {id: id},
                        dataType: 'json',
                        success: function (data) {
                            $('#mainPartsImages').html(data.data);

                            $('.partDetails').click(function(){
                                var id = $(this).attr('data-id');
                                $.ajax({
                                    type: 'POST',
                                    url: '{{ route('web.get.PartDetails') }}',
                                    data: {id: id},
                                    dataType: 'json',
                                    success: function (data) {
                                        console.log(data.part_name);
                                        $('#PartNameModal').html(data.part_name);
                                        $('#mainPartImage-href').attr('href',data.main_image);
                                        $('#mainPartImage-src').attr('src',data.main_image);
                                        $('#part-childrens').html("");
                                        $('#part-childrens').html(data.data);


                                        var numberOfItems = 0;
                                        $('.new-p :checkbox').change(function() {
                                            var $this = $(this);
                                            if ($this.is(':checked')) {
                                                var newInput = $('<li class="addme"><div class="quant"><div class="count"><div class="value-button cart-qty-plus" > <i class="fas fa-arrow-circle-up"></i> </div><input type="number" readonly min="1" value="1" id="number" class="number"><div class="value-button cart-qty-minus" > <i class="fas fa-arrow-circle-down"></i> </div></div></div></li>');
                                                $($this).closest('.inDetails').append(newInput);
                                                numberOfItems++;
                                                //                    input number simulator function
                                                var incrementPlus;
                                                var incrementMinus;
                                                var buttonPlus = $(this).parents('li').next("li.addme").find(".cart-qty-plus");
                                                var buttonMinus = $(this).parents('li').next("li.addme").find(".cart-qty-minus");
                                                var incrementPlus = buttonPlus.click(function() {
                                                    var $n = $(this)
                                                        .parent(".count")
                                                        .parent(".quant")
                                                        .find(".number");
                                                    $n.val(Number($n.val()) + 1);
                                                });
                                                var incrementMinus = buttonMinus.click(function() {
                                                    var $n = $(this)
                                                        .parent(".count")
                                                        .parent(".quant")
                                                        .find(".number");
                                                    var amount = Number($n.val());
                                                    if (amount > 1) {
                                                        $n.val(amount - 1);
                                                    }
                                                });
                                            } else {
                                                $($this).closest('.inDetails').find('.addme').remove();
                                                numberOfItems--;
                                            }
                                            console.log(numberOfItems);
                                            if (numberOfItems == 0) {
                                                $(".fxd-btn").attr('disabled', 'true');
                                            } else {
                                                $(".fxd-btn").removeAttr('disabled');
                                            }
                                        });
                                        $(".fxd-btn").click(function() {
                                            $("#the-choseen-parts").html('');
                                            $('.new-p input.if-check').each(function() {
                                                if ($(this).is(':checked')) {
                                                    var itemName = $(this).prev('.name-p').html();
                                                    console.log(itemName);
                                                    var itemQuantity = $(this).parents('li').next('li.addme').find('input').val();
                                                    console.log(itemQuantity);

                                                    $("#the-choseen-parts").append('<div class="prod1"><a class="close"> <svg class="svg-inline--fa fa-times fa-w-11" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg></a><input type="hidden" value="' + itemName + '"> <h4> ' + itemName + '</h4> <input type="hidden" value="' + itemQuantity + '"> <span class="qnt"> ' + itemQuantity + '</span></div>')
                                                }

                                                /**********************  Remove Piece *****************/
                                                $(".close").click(function() {
                                                    $(this).parent(".prod1").remove();
                                                });
                                            })
                                        })
                                    }
                                });
                            });

                        }
                    });
                });




            });


        });



        $(document).delegate('#goPrev', 'click', function() {
            var a = $(".wizard").steps("previous");
            if (!a) {
                $(".wizard").steps("finish");
            }
        });

    </script>
    <!-- End Form -->
    <script src="{{asset('website/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('website/js/all.min.js')}}"></script>
    <script src="{{asset('website/js/select2.full.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(".js-select2").select2();
        //     $(".select2").click(function(e) {
        //         e.stopPropagation();
        // });
        });

    </script>
    <!--Start Input Image --->
    <script>
        $(document).ready(function() {
            $('#upp-btn').change(function(event) {
                $('#appended-pic').html(' ');
                $('#appended-pic').append('<div class="uploaded-block"><img src="' + URL.createObjectURL(event.target.files[0]) + '"><button class="close">&times;</button></div>');
            });
            // REMOVE IMAGE
            $('#appended-pic').on('click', '.close', function() {
                $(this).parents('.uploaded-block').remove();
            });
        });

    </script>
    <!--End Input Image --->
    <!---------- Quantity --------------->
    <script>
        /********** Counter ************/
        $(document).ready(function() {
            var incrementPlus;
            var incrementMinus;
            var buttonPlus = $(".cart-qty-plus");
            var buttonMinus = $(".cart-qty-minus");
            var incrementPlus = buttonPlus.click(function() {
                var $n = $(this)
                    .parent(".count")
                    .parent(".quant")
                    .find(".number");
                $n.val(Number($n.val()) + 1);
            });
            var incrementMinus = buttonMinus.click(function() {
                var $n = $(this)
                    .parent(".count")
                    .parent(".quant")
                    .find(".number");
                var amount = Number($n.val());
                if (amount > 0) {
                    $n.val(amount - 1);
                }
            });
        });

    </script>
    <!------------ IF Checked --------------->
    <script>
        $(document).ready(function() {
            var numberOfItems = 0;
            $('.new-p :checkbox').change(function() {
                var $this = $(this);
                if ($this.is(':checked')) {
                    var newInput = $('<li class="addme"><div class="quant"><div class="count"><div class="value-button cart-qty-plus" > <i class="fas fa-arrow-circle-up"></i> </div><input type="number" readonly min="1" value="1" id="number" class="number"><div class="value-button cart-qty-minus" > <i class="fas fa-arrow-circle-down"></i> </div></div></div></li>');
                    $($this).closest('.inDetails').append(newInput);
                    numberOfItems++;
                    //                    input number simulator function
                    var incrementPlus;
                    var incrementMinus;
                    var buttonPlus = $(this).parents('li').next("li.addme").find(".cart-qty-plus");
                    var buttonMinus = $(this).parents('li').next("li.addme").find(".cart-qty-minus");
                    var incrementPlus = buttonPlus.click(function() {
                        var $n = $(this)
                            .parent(".count")
                            .parent(".quant")
                            .find(".number");
                        $n.val(Number($n.val()) + 1);
                    });
                    var incrementMinus = buttonMinus.click(function() {
                        var $n = $(this)
                            .parent(".count")
                            .parent(".quant")
                            .find(".number");
                        var amount = Number($n.val());
                        if (amount > 1) {
                            $n.val(amount - 1);
                        }
                    });
                } else {
                    $($this).closest('.inDetails').find('.addme').remove();
                    numberOfItems--;
                }
                console.log(numberOfItems);
                if (numberOfItems == 0) {
                    $(".fxd-btn").attr('disabled', 'true');
                } else {
                    $(".fxd-btn").removeAttr('disabled');
                }
            });
            $(".fxd-btn").click(function() {
                $("#the-choseen-parts").html('');
                $('.new-p input.if-check').each(function() {
                    if ($(this).is(':checked')) {
                        var itemName = $(this).prev('.name-p').html();
                        console.log(itemName);
                        var itemQuantity = $(this).parents('li').next('li.addme').find('input').val();
                        console.log(itemQuantity);

                        $("#the-choseen-parts").append('<div class="prod1"><a class="close"> <svg class="svg-inline--fa fa-times fa-w-11" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg></a><input type="hidden" value="' + itemName + '"> <h4> ' + itemName + '</h4> <input type="hidden" value="' + itemQuantity + '"> <span class="qnt"> ' + itemQuantity + '</span></div>')
                    }

                    /**********************  Remove Piece *****************/
                    $(".close").click(function() {
                        $(this).parent(".prod1").remove();
                    });
                })
            })
        });

    </script>
    <!---------- Radio Button Required ------------>
    <script>
        $(document).ready(function() {
            var $radio = $('input:radio[name="choice"]');
            $radio.addClass("validate[required]");

        });

    </script>
    <!--------------------------------------------->

    <!---------------------------------->
    <!------------  Toggle ------------------->
    <script>
        $(document).ready(function() {

            $(".tgle").slideUp();
            $(".text-down").slideUp();
            $(".to-tgle").click(function() {

                var Ordertype = $('#order_type_car');
                var orderVal = Ordertype.val();

                Ordertype.val(orderVal == 1 ? 0 : 1);

                $(".tgle").slideToggle(500);
                $(".up-tgle").slideToggle(500);
                $(".text-down").slideToggle(500);
                $(".text-up").slideToggle(500);

            });
        });

    </script>
    <!----------- Search Input -------------------->
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
    <!-------------------->
    <!----------- Input Required ----------->
    <!--
    <script>
        $(document).ready(function() {
            $("#account-form").validate({
                rules: {
                    "choiseC]": "required"
                },
                messages: {
                    "choiseC": "Please select category",
                }
            });
        });
    </script>
-->



@endsection
