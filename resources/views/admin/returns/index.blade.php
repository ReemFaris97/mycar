@extends('admin.layout.master')
@section('title','قائمة المرتجعات')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
{{--                <a href="{{route('categories.create')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light">--}}
{{--                    إضافة قسم رئيسي--}}
{{--                    <span class="m-l-5"><i class="fa fa-plus"></i></span>--}}
{{--                </a>--}}

            </div>

            <h4 class="page-title">قائمة طلبات المرتجعات</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">كل الطلبات</h4>


                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>إسم المستخدم</th>
                        <th>رقم الطلب</th>
                        <th>حالة طلب الإسترجاع</th>
                        <th>وصف طلب الإسترجاع</th>
                        <th>خيارات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp

                    @foreach($returnItems as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->user->name}}</td>
                            <td>{{$row->order->id}}</td>
                            <td>
                                @switch($row->status)
                                @case('waiting') جاري الإنتظار @break
                                @case('accepted') تم الموافقة @break
                                @case('refused') تم الرفض @break
                                @endswitch
                            </td>
                            <td>{{$row->reason}}</td>
                            <td style="width: 150px;">
                                @if($row->status =='waiting')
                                    <a href="javascript:;" data-id="{{$row->id}}" data-action="accept" data-url="{{route('ajax.change.returnStatus')}}" class="suspendOrActivate label label-success">موافقة</a>
                                    <a href="javascript:;" data-id="{{$row->id}}" data-action="refuse" data-url="{{route('ajax.change.returnStatus')}}" class="suspendOrActivate label label-danger">رفض</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

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

            if(action == 'refuse'){
                text = 'هل تريد رفض طلب الإسترجاع فعلا ؟';
                type = 'error';
                confirmButtonClass = 'btn-danger waves-effect waves-light';
                redirectionRoute = '{{route('return-items.index')}}';

            }if(action =='accept'){
                text = 'هل تريد قبول طلب الإسترجاع فعلا ؟';
                type = 'success';
                confirmButtonClass = 'btn-success waves-effect waves-light';
                redirectionRoute = '{{route('return-items.index')}}';
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
    </script>

@endsection
