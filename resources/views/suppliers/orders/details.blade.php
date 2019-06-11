@extends('suppliers.layout.master')
@section('title',"تفاصيل الطلب")

@section('styles')
    <!-- Custom box css -->
    <link href="{{asset('supplier/assets/plugins/custombox/dist/custombox.min.css')}}" rel="stylesheet">
    <style>
        .loading-bar {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-image: {{asset('supplier/assets/images/Spinner.gif')}};
            background-position: 50% 50%;
            background-color: rgba(255,255,255,0.8) ;
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

            <h4 class="page-title">تفاصيل الطلب رقم : {{$order->id}}</h4>
        </div>
    </div><!--End Page-Title -->


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h2 class="header-title m-t-0 m-b-30">بيانات الطلب رقم : {{$order->id}}</h2>
                {{--<button onclick="window.print();"  class="no-print btn btn-custom dropdown-toggle waves-effect waves-light">--}}
                {{--طباعة تقرير كامل--}}
                {{--<span class="m-l-5"><i class="fa fa-print"></i></span>--}}
                {{--</button>--}}
                <div class="row">
                    <div class="col-sm-12">


                        <div class="col-md-4">
                            <h3>إسم مقدم الطلب:</h3>
                            <h4 style="font-weight: 600;">{{$order->user->name}}</h4>
                        </div>

                        <div class="col-md-4">
                        <h3>حالة الطلب :</h3>

                        <h4 style="font-weight: 600;">
                            @if($order->status == 'new')
                                <label class="label label-success">جديد</label>
                            @endif

                            @if($order->status == 'waiting')
                                @if($order->hasAnyReplyByAuthSupplier())
                                    <label class="label label-primary">قيد الإنتظار</label>
                                @else
                                    <label class="label label-success">جديد</label>
                                @endif
                            @endif

                            @if($order->status == 'received')
                                <label class="label label-success">طلبات معتمده</label>
                            @endif

                            @if($order->status == 'finished')
                                @if($order->hasRefusedReplyByAuthSupplier())
                                    <label class="label label-danger">مرفوض</label>
                                @else
                                    <label class="label label-purple">منتهي</label>
                                @endif
                            @endif

                        </h4>
                        </div>


                        <div class="col-md-4">
                            <h3>المدينة: </h3>
                            <h4 style="font-weight: 600;">{{$order->city->ar_name}}</h4>
                        </div>


                        <div class="col-md-12">
                            <h3>بيانات السيارة:</h3>
                        </div>

                        <div class="col-md-4">
                            <h3>الشركة المصنعة: </h3>
                            <h4 style="font-weight: 600;">{{$order->company->ar_name}}</h4>
                        </div>

                        <div class="col-md-4">
                            <h3>الموديل : </h3>
                            <h4 style="font-weight: 600;">{{$order->company_model->ar_name}}</h4>
                        </div>

                        <div class="col-md-4">
                            <h3>سنة الإنتاج : </h3>
                            <h4 style="font-weight: 600;">{{$order->year}}</h4>
                        </div>

                        <div class="col-md-4">
                            <h3>سعر التوصيل : </h3>
                            <h4 style="font-weight: 600;">{{$order->city->delivery_price}}</h4>
                        </div>

                        @if($order->hasAnyReplyByAuthSupplier())
                        <div class="col-md-4">
                            <h3>قيمة العرض المقدم للمستخدم : </h3>
                            <h4 style="font-weight: 600;">{{$order->myReply()->total}}</h4>
                        </div>

                        <div class="col-md-4">
                            <h3>قيمة العرض بعد التوصيل : </h3>
                            <h4 style="font-weight: 600;">{{$order->myReply()->total  + $order->delivery_value}}</h4>
                        </div>
                        @endif


                        <div class="col-md-12">
                            <h3>منتجات الطلب:</h3>
                        </div>
                        {{--id="datatable-responsive"--}}
                        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>م</th>
                                <th style="width: 200px;">إسم القطعة</th>
                                <th>رقم الهيكل</th>
                                <th>صورة الاستمارة</th>
                                <th style="width: 120px;">جديد او مستعمل</th>
                                <th>الوصف</th>
                                <th style="width: 70px;">عدد القطع</th>
                                <th>صورة للقطعة</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($order->order_details as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->part->ar_name}}</td>
                                    <td>{{$order->structure_number}}</td>

                                    <td style="width: 10%;">
                                        <a data-fancybox="gallery"
                                           href="{{getimg($row->image)}}">
                                            <img style="width: 50%; border-radius: 50%; height: 49px;"
                                                 src="{{getimg($row->image)}}"/>
                                        </a>

                                    </td>
                                    <td>
                                        @if($order->parts_type == 'new')
                                            جديد
                                            @else
                                            مستعمل
                                        @endif
                                    </td>
                                    <td>{{$row->description}}</td>
                                    <td>{{$row->quantity}}</td>

                                    <td style="width: 10%;">
                                        <a data-fancybox="gallery"
                                           href="{{getimg($row->image)}}">
                                            <img style="width: 50%; border-radius: 50%; height: 49px;"
                                                 src="{{getimg($row->image)}}"/>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <br>


                        <div class="col-md-12">
                            <h3>إجراءات الطلب </h3>
                            <label class="help-block">(تسعير - إنهاء )</label>
                            <a id="pricing_done" style="display: none;" disabled class="btn btn-success waves-effect waves-light btn-lg m-b-5" >تم إرسال الطلب</a>

                            @if($order->hasAnyReplyByAuthSupplier())
                                <a id="pricing_done"  disabled class="btn btn-success waves-effect waves-light btn-lg m-b-5" >تم إرسال الطلب</a>
                            @else
                                <a href="#custom-modal" id="pricing_button" class="btn btn-primary waves-effect waves-light btn-lg m-b-5" data-animation="swell" data-plugin="custommodal"
                                   data-overlaySpeed="100" data-overlayColor="#36404a">تسعير الطلب</a>
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
        <h4 class="custom-modal-title">قائمة تسعير المنتجات</h4>
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
                    <th>م</th>
                    <th >إسم القطعة</th>
                    <th >جديد او مستعمل</th>
                    <th >عدد القطع</th>
                    <th>سعر القطعة</th>

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
                                جديد
                            @else
                                مستعمل
                            @endif
                        </td>
                        <td>{{$row->quantity}}</td>
                        <td>
                            <input type="number" required value="{{old('phone')}}"
                                   data-parsley-required-message="هذا الحقل مطلوب"
                                   data-parsley-trigger="keyup"
                                   {{--data-parsley-maxlength="10"--}}
                                   {{--data-parsley-maxlength-message="أقصى عدد ارقام هو 10 حرف"--}}
                                   {{--data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
                                   {{--data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                                   oninput="this.value = Math.abs(this.value)"
                                   name="part_price[]" class="form-control" placeholder="سعر القطعة">
                        </td>
                    </tr>
                  <input type="hidden" name="order_details_id[]" value="{{$row->id}}">
                  <input type="hidden" name="quantities[]" value="{{$row->quantity}}">
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info waves-effect waves-light">إرسال العرض</button>
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
    </script>

@endsection
