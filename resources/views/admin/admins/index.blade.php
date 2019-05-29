@extends('admin.layout.master')
@section('title','المديرين المساعدين')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{route('admins.create')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                    إنشاء مساعد جديد
                    <span class="m-l-5"><i class="fa fa-plus"></i></span>
                </a>

            </div>

            <h4 class="page-title">المديرين المساعدين</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">كل المديرين المساعدين</h4>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width:20px;">م</th>
                        <th style="width:250px;">إسم المستخدم</th>
                        <th style="width:200px;">البريد الإلكتروني</th>
                        <th style="width:20px;">رقم الجوال</th>
                        <th style="width:20px;">الأدوار</th>
                        <th style="width:20px;">الحالة</th>
                        <th style="width:185px;">خيارات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($admins as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>
                                <ul>
                                    @foreach($row->roles as $role)
                                    <li>{{$role->title}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if($row->is_active ==1)
                                    <span class="label label-success">مفعل</span>
                                @else
                                    <span class="label label-danger">غير مفعل</span>
                                @endif
                            </td>

                            <td style="width: 150px;">

                                <a href="{{route('admins.show',$row->id)}}" class="label label-primary">تفاصيل</a>
                                @if($row->is_active == 1)
                                    @if(auth()->id() != $row->id)
                                        <a href="javascript:;" data-toggle="modal" data-target="#con-close-modal" data-id="{{$row->id}}" data-action="suspend" data-url="{{route('admins.suspendWithReason')}}" class="suspendWithReason label label-danger">حظر</a>
                                    @endif
                                @else
                                    <a id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-action="activate" data-url="{{route('admins.suspendOrActivate')}}" class="suspendOrActivate label label-success">تفعيل</a>
                                @endif

                                @if(auth()->id() != $row->id )
                                <a href="{{route('admins.edit',$row->id)}}" class="label label-warning">تعديل</a>
                                @endif

{{--                                <a href="{{route('chat.show',$row->channel_info()['chat_id'])}}" class="label label-info">المحادثه</a>--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <form id="suspendForm" data-parsley-validate novalidate method="POST" action="{{route('admins.suspendWithReason')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">حظر المستخدم</h4>
                                </div>
                                <div class="modal-body">

                                    {{--<input type="hidden" id="idHolder">--}}


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group no-margin">
                                                <label for="field-7" class="control-label">سبب الحظر</label>
                                                <textarea name="suspend_reason" data-parsley-required data-parsley-required-message="سبب الحظر مطلوب" maxlength="191"  class="form-control autogrow" id="suspendField" placeholder="أكتب سبب الحظر" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">إلغاء</button>
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">حظر</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                </form>
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

        $('body').on('click', '.suspendOrActivate', function () {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            var $tr = $(this).closest($('#elementRow' + id).parent().parent());
            var action = $(this).attr('data-action');
            var text = '';
            var type = '';
            var confirmButtonClass = '';
            var redirectionRoute = '';

            if(action == 'suspend'){
                text = 'هل تريد حظر المساعد؟ فعلا ؟';
                type = 'error';
                confirmButtonClass = 'btn-danger waves-effect waves-light';
                redirectionRoute = '{{route('admins.index')}}?active=yes';

            }if(action =='activate'){
                text = 'هل تريد تفعيل المساعد فعلا ؟';
                type = 'success';
                confirmButtonClass = 'btn-success waves-effect waves-light';
                redirectionRoute = '{{route('admins.index')}}?active=no';
            }

            swal({
                    title: "هل انت متأكد؟",
                    text: text,
                    type: type,
                    showCancelButton: true,
                    confirmButtonColor: "#27dd24",
                    confirmButtonText: "موافق",
                    cancelButtonText: "إلغاء",
                    confirmButtonClass:confirmButtonClass,
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

//                                    $tr.find('td').fadeOut(100,function () {
//                                        $tr.remove();
//                                    });

                                    function pageRedirect() {
                                        window.location.href =redirectionRoute;
                                    }
                                    setTimeout(pageRedirect(), 750);
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

        $('body').on('click', '.suspendWithReason', function () {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
//            var idHolder = $('#idHolder').attr('value',id);

            $('#suspendForm').on('submit',function (e) {
                e.preventDefault();
                var suspendReason = $('#suspendField').val();

                $.ajax({
                    type:'post',
                    url :url,
                    data:{id:id,suspendReason:suspendReason},
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
                            $toastlast = $toast

                            function pageRedirect() {
                                window.location.href ='{{route('admins.index')}}';
                            }
                            setTimeout(pageRedirect(), 750);
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

            })

        });




    </script>

@endsection
