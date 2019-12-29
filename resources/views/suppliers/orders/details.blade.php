@extends('suppliers.layout.master')
@section('title',__('suppliers.order_details'))

@section('styles')
    <!-- Custom box css -->
    <link href="{{asset('supplier/assets/plugins/custombox/dist/custombox.min.css')}}" rel="stylesheet">
    <style>
        .loading-bar {
            display: none;
            position: fixed;
            z-index: 999999999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-image: url("/supplier/assets/images/Spinner.gif");
            background-position: 50% 50%;
            background-color: rgba(255,255,255,0.3) ;
            background-repeat: no-repeat;
        }

        body.loading{
            overflow: hidden;
        }
        body.loading .loading-bar {
            display: block;

        }
    </style>
@endsection
{{--@section('styles')--}}
{{--<style>--}}
{{--.dataTables_filter, .dataTables_info, .pagination { display: none; }--}}
{{--</style>--}}
{{--<style type="text/css" media="print">--}}
{{--.prevent, .no-print,.dt-buttons,.dataTables_filter,.dataTables_info,.pagination { display: none; }--}}
{{--</style>--}}
{{--@endsection--}}
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <button onclick="window.history.back();"  class="no-print btn btn-custom dropdown-toggle waves-effect waves-light">
                    رجوع
                    <span class="m-l-5"><i class="fa fa-arrow-left"></i></span>
                </button>

            </div>

            <h4 class="page-title">@lang('suppliers.order_details_no'){{$order->id}}</h4>
        </div>
    </div><!--End Page-Title -->


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h2 class="header-title m-t-0 m-b-30">@lang('suppliers.order_details_no') {{$order->id}}</h2>
                {{--<button onclick="window.print();"  class="no-print btn btn-custom dropdown-toggle waves-effect waves-light">--}}
                {{--طباعة تقرير كامل--}}
                {{--<span class="m-l-5"><i class="fa fa-print"></i></span>--}}
                {{--</button>--}}
                <div class="row">
                    <div class="col-sm-12">


                        <div class="col-md-4">
                            <h3>@lang('suppliers.order_owner')</h3>
                            <h4 style="font-weight: 600;">{{$order->user->name}}</h4>
                        </div>

                        <div class="col-md-4">
                        <h3>@lang('suppliers.order_status')</h3>

                        <h4 style="font-weight: 600;">
{{--                            @if($order->status != 'new')--}}
{{--                                --}}
{{--                            @else--}}

                                @switch($order->status)
                                    @case('new')
                                        @if($order->hasDelivery())
                                            <label class="label label-primary">@lang('suppliers.waiting_order_owner_reply')</label>
                                        @else
                                            <label class="label label-primary">@lang('suppliers.new')</label>
                                        @endif
                                    @break

                                    @case('accepted')
                                        <label class="label label-success">@lang('suppliers.customer_accepted')</label>
                                    @break

                                    @case('prepare')
                                        <label class="label label-purple">@lang('suppliers.order_prepare')</label>
                                    @break

                                    @case('onWay')
                                        <label class="label label-pink">@lang('suppliers.delivery_receive')</label>
                                    @break

                                    @case('delivered')
                                        <label class="label label-inverse">@lang('suppliers.delivered')</label>
                                    @break


                                @endswitch

{{--                            @if($order->status == 'new')--}}
{{--                                <label class="label label-success">جديد</label>--}}
{{--                            @endif--}}

{{--                            @if($order->status == 'waiting')--}}
{{--                                @if($order->hasAnyReplyByAuthSupplier())--}}
{{--                                    <label class="label label-primary">قيد الإنتظار</label>--}}
{{--                                @else--}}
{{--                                    <label class="label label-success">جديد</label>--}}
{{--                                @endif--}}
{{--                            @endif--}}

{{--                            @if($order->status == 'received')--}}
{{--                                <label class="label label-success">طلبات معتمده</label>--}}
{{--                            @endif--}}

{{--                            @if($order->status == 'finished')--}}
{{--                                @if($order->hasRefusedReplyByAuthSupplier())--}}
{{--                                    <label class="label label-danger">مرفوض</label>--}}
{{--                                @else--}}
{{--                                    <label class="label label-purple">منتهي</label>--}}
{{--                                @endif--}}
{{--                            @endif--}}

{{--                    @endif--}}
                        </h4>
                        </div>


{{--                        <div class="col-md-4">--}}
{{--                            <h3>المدينة: </h3>--}}
{{--                            <h4 style="font-weight: 600;">{{$order->city->ar_name}}</h4>--}}
{{--                        </div>--}}


                        <div class="col-md-12">
                            <h3>@lang('suppliers.car_info')</h3>
                        </div>

                        <div class="col-md-4">
                            <h3>@lang('suppliers.company')</h3>
                            <h4 style="font-weight: 600;">{{$order->company->ar_name}}</h4>
                        </div>

                        <div class="col-md-4">
                            <h3>@lang('suppliers.models')</h3>
                            <h4 style="font-weight: 600;">{{$order->company_model->ar_name}}</h4>
                        </div>

                        <div class="col-md-4">
                            <h3>@lang('suppliers.manufa_year')</h3>
                            <h4 style="font-weight: 600;">{{$order->year}}</h4>
                        </div>

{{--                        <div class="col-md-4">--}}
{{--                            <h3>سعر التوصيل : </h3>--}}
{{--                            <h4 style="font-weight: 600;">--}}
{{--                                {{optional($order)->city->delivery_price}}--}}
{{--                            </h4>--}}
{{--                        </div>--}}

                        @if($order->hasAnyReplyByAuthSupplier())
                        <div class="col-md-4">
                            <h3>@lang('suppliers.offer_value')</h3>
                            <h4 style="font-weight: 600;">{{$order->myReply()->total}}</h4>
                        </div>

                        <div class="col-md-4">
                            <h3>@lang('suppliers.offer_after_delivary')</h3>
                            <h4 style="font-weight: 600;">{{$order->myReply()->total  + $order->delivery_value}}</h4>
                        </div>
                        @endif


                        <div class="col-md-12">
                            <h3>@lang('suppliers.order_products')</h3>
                        </div>
                        {{--id="datatable-responsive"--}}
                        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>@lang('suppliers.no')</th>
                                <th style="width: 200px;">@lang('suppliers.part_name')</th>
                                <th>@lang('suppliers.structure_number')</th>
                                <th>@lang('suppliers.form_image')</th>
                                <th style="width: 120px;">@lang('suppliers.new_or_used')</th>
{{--                                <th>الوصف</th>--}}
                                <th style="width: 70px;">@lang('suppliers.part_no')</th>
                                <th>@lang('suppliers.part_image')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($order->order_details as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->part->ar_name}}</td>
                                    <td>{{$order->structure_number == null?"------" : $order->structure_number}}</td>

                                    <td style="width: 10%;">
                                        @if($row->form_image != null)
                                        <a data-fancybox="gallery"
                                           href="{{getimg($row->form_image)}}">
                                            <img style="width: 50%; border-radius: 50%; height: 49px;"
                                                 src="{{getimg($row->form_image)}}"/>
                                        </a>
                                            @else
                                            -------
                                        @endif

                                    </td>
                                    <td>
                                        @if($order->parts_type == 'new')
                                            @lang('suppliers.new')
                                            @else
                                            @lang('suppliers.used')
                                        @endif
                                    </td>
{{--                                    <td>{{$row->description}}</td>--}}
                                    <td>{{$row->quantity}}</td>

                                    <td style="width: 10%;">
                                        <a data-fancybox="gallery"
                                           href="{{getimg($row->part->image)}}">
                                            <img style="width: 50%; border-radius: 50%; height: 49px;"
                                                 src="{{getimg($row->part->image)}}"/>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <br>


                        <div class="col-md-12">
                            <h3>@lang('suppliers.order_steps')</h3>
                            <label class="help-block">@lang('suppliers.pricing_finishing')</label>

                            @if($order->status != 'accepted')
                            <a id="pricing_done" style="display: none;" disabled class="btn btn-success waves-effect waves-light btn-lg m-b-5" >@lang('suppliers.order_sent')</a>

                            @if($order->hasAnyReplyByAuthSupplier())
                                <a id="pricing_done"  disabled class="btn btn-success waves-effect waves-light btn-lg m-b-5" >@lang('suppliers.order_sent')</a>
                            @else
                                <a href="#custom-modal" id="pricing_button" class="btn btn-primary waves-effect waves-light btn-lg m-b-5" data-animation="superscaled" data-plugin="custommodal"
                                   data-overlaySpeed="100" data-overlayColor="#36404a">@lang('suppliers.order_pricing')</a>
                            @endif

                            @endif


                                @if($order->status =='accepted')
                                    <a href="javascript:;" data-action="prepare"    data-id="{{$order->id}}"   class="changeOrderStatus btn btn-primary waves-effect waves-light btn-lg m-b-5" >@lang('suppliers.preparing')</a>
                                @endif

                                @if($order->status == 'prepare')
                                    <a href="javascript:;" data-action="onWay"      data-id="{{$order->id}}"   class="changeOrderStatus btn btn-primary waves-effect waves-light btn-lg m-b-5" >@lang('suppliers.with_receiver')</a>
                                @endif

                                @if($order->status == 'onWay')
                                    <a href="javascript:;" data-action="delivered"  data-id="{{$order->id}}"   class="changeOrderStatus btn btn-primary waves-effect waves-light btn-lg m-b-5" >@lang('suppliers.delivered')</a>
                                @endif

                                @if($order->status == 'delivered')
                                <a id="pricing_done"  disabled class="btn btn-success waves-effect waves-light btn-lg m-b-5" >@lang('suppliers.delivered_successfully')</a>
                                @endif


                        </div>


                        {{--<div class="col-md-4">--}}
                            {{--<h4>الصورة الشخصية</h4>--}}
                            {{--<div  style="width: 200px; height: 150px;">--}}
                                {{--@if($user->image)--}}
                                    {{--<a href="{{getimg($user->image)}}" class="image-popup" title="Screenshot-1">--}}
                                        {{--<img width="200" height="150" src="{{getimg($user->image)}}" class="thumb-img" alt="work-thumbnail">--}}
                                    {{--</a>--}}
                                {{--@else--}}
                                    {{--<a href="{{asset('admin/assets/images/noimage.png')}}" class=" image-popup" title="Screenshot-1">--}}
                                        {{--<img width="200" height="150" src="{{asset('admin/assets/images/noimage.png')}}" class="thumb-img" alt="work-thumbnail">--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                </div> <!--End of row-->

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="custom-modal"  class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">@lang('suppliers.pricing_list')</h4>
        <form id="pricing_form" data-parsley-validate novalidate method="post" action="{{route('supplier.order.pricing',$order->id)}}" class="form-horizontal" enctype="multipart/form-data">
        <div class="modal-body">
                {{csrf_field()}}

            <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                @if($errors->has('part_price'))
                    <p class="help-block" style="color: #FF0000;">
                        {{ $errors->first('part_price') }}
                    </p>
                @endif
                <thead>
                <tr>
                    <th>@lang('suppliers.no')</th>
                    <th >@lang('suppliers.part_name')</th>
                    <th >@lang('suppliers.new_or_used')</th>
                    <th >@lang('suppliers.parts_count')</th>
                    <th>@lang('suppliers.part_price')</th>

                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                @foreach($order->order_details as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->part->ar_name}}</td>
                        <td>
                            @if($order->parts_type == 'new')
                                @lang('suppliers.new')
                            @else
                                @lang('suppliers.used')
                            @endif
                        </td>
                        <td>{{$row->quantity}}</td>
                        <td>
                            <input type="number" required value="{{old('phone')}}"
                                   data-parsley-required-message="@lang('web.field_required')"
                                   data-parsley-trigger="keyup"
                                   {{--data-parsley-maxlength="10"--}}
                                   {{--data-parsley-maxlength-message="أقصى عدد ارقام هو 10 حرف"--}}
                                   {{--data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
                                   {{--data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                                   oninput="this.value = Math.abs(this.value)"
                                   name="part_price[]" class="form-control" placeholder="@lang('suppliers.part_price')">
                        </td>
                    </tr>
                  <input type="hidden" name="order_details_id[]" value="{{$row->id}}">
                  <input type="hidden" name="quantities[]" value="{{$row->quantity}}">
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info waves-effect waves-light">@lang('suppliers.send_offer')</button>
            <button type="button" class="btn btn-danger waves-effect" onclick="Custombox.close();">إلغاء</button>
        </div>
        </form>
    </div>
    <div class="loading-bar"></div>


@endsection

@section('scripts')
    <!-- Modal-Effect -->
    <script src="{{asset('supplier/assets/plugins/custombox/dist/custombox.min.js')}}"></script>
    <script src="{{asset('supplier/assets/plugins/custombox/dist/legacy.min.js')}}"></script>

    <!-- ------------>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#pricing_form').on('submit', function (e) {
            e.preventDefault();
            var form = $(this);
            form.parsley().validate();
            if (form.parsley().isValid()) {
                var formData = new FormData(this);
                document.body.className = "loading";
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        if (data.status === true) {

                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };
                            var $toast = toastr['success'](msg,title);
                            $toastlast = $toast;
                            $('#pricing_form').each(function () {
                                this.reset();
                            });
                            document.body.className = "";
                            Custombox.close();
                            $('#pricing_button').hide();
                            $('#pricing_done').show();

                            // var refresh = function(){
                            //     location.reload();
                            // };
                            // setTimeout(refresh, 3000);

                        } else {
                            document.body.className = "";
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

        $('.changeOrderStatus').on('click',function(e){
            var id = $(this).data('id');
            var action  = $(this).data('action');
            var url     = "{{route('supplier.order.changeStatus')}}";

            swal({
                    title: "@lang('suppliers.r_u_s')",
                    text: 'هل تريد تغيير حالة الطلب فعلا ؟',
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#27dd24",
                    confirmButtonText: "موافق",
                    cancelButtonText: "إلغاء",
                    confirmButtonClass:"btn-success waves-effect waves-light",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                },
                function (isConfirm) {
                    if(isConfirm){
                        $.ajax({
                            type:'post',
                            url :url,
                            data:{id:id,action:action},
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

                                    setTimeout(function(){
                                        location.reload();
                                        }, 2500);
                                    // tr.find('td').fadeOut(1000, function () {
                                    //     tr.remove();
                                    // });
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
                    }

                }
            );
        });
    </script>

@endsection
