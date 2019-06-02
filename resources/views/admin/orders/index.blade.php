@extends('admin.layout.master')
@section('title','طلبات العملاء')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                {{--<a href="" class="btn btn-custom dropdown-toggle waves-effect waves-light">--}}
                    {{--إضافة مستخدم جديد--}}
                    {{--<span class="m-l-5"><i class="fa fa-plus"></i></span>--}}
                {{--</a>--}}
            </div>

            <h4 class="page-title">طلبات العملاء</h4>
        </div>
    </div>
    <!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">كل الطلبات</h4>


                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم مقدم الطلب</th>
                        <th>عدد القطع بالطلب</th>
                        <th>حالة الطلب</th>
                        <th style="width: 250px;" >العمليات المتاحة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->order_details->count()}}</td>
                            <td>
                                    لسه الحالة
                            </td>

                            <td>
                                <a href="{{route('orders.show',$order->id)}}" class="label label-primary">تفاصيل</a>
                                {{--<a href="{{route('orders.edit',$row->id)}}" class="label label-warning">تعديل</a>--}}

                                {{--@if(auth()->id() != $row->id)--}}
                                    {{--@if($row->is_active == 1)--}}
                                        {{--<a id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-action="suspend" data-url="{{route('users.suspendOrActivate')}}" class="statusWithReason label label-danger">حظر</a>--}}
                                    {{--@else--}}
                                        {{--<a id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-action="activate" data-url="{{route('users.suspendOrActivate')}}" class="statusWithReason label label-success">تفعيل</a>--}}
                                    {{--@endif--}}

                                    <a  id="elementRow{{$order->id}}" href="javascript:;" data-id="{{$order->id}}" data-url="{{route('orders.destroy',$order->id)}}" class="removeElement label label-danger">حذف</a>

                                {{--@endif--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- activation  Modal -->
                <div class="modal fade" id="myModal_active" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 id="modal_header" class="modal-title">تفعيل المستخدم</h4>
                            </div>
                            <div class="modal-body">
                                <label for="reason">رسالة التفعيل</label>
                                <textarea id="activate_reason" name="reason" placeholder="اكتب رسالة التفعيل"  class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button id="activeButton" type="button" class="btn btn-success">إرسال</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Suspend Modal -->
                <div class="modal fade" id="myModal_suspend" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 id="modal_header" class="modal-title">حظر المستخدم</h4>
                            </div>
                            <div class="modal-body">
                                <label for="reason">رسالة الحظر</label>
                                <textarea id="suspend_reason" placeholder="اكتب رسالة الحظر" name="reason" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button id="suspendButton" type="button" class="btn btn-danger">حظر</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>

        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            var tr = $(this).closest($('#elementRow' + id).parent().parent());

            swal({
                    title: "هل انت متأكد؟",
                    text: 'هل تريد حذف المستخدم فعلا ؟',
                    type: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#27dd24",
                    confirmButtonText: "موافق",
                    cancelButtonText: "إلغاء",
                    confirmButtonClass:"btn-danger waves-effect waves-light",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                },
                function (isConfirm) {
                    if(isConfirm){
                        $.ajax({
                            type:'delete',
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



                                    tr.find('td').fadeOut(1000, function () {
                                        tr.remove();
                                    });

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
