@extends('admin.layout.master')
@section('title','المدن')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <a href="{{route('cities.create')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                    إضافة مدينة
                    <span class="m-l-5"><i class="fa fa-plus"></i></span>
                </a>

            </div>

            <h4 class="page-title">المدن</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">كل المدن</h4>


                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>

                        <th>إسم المدينة بالعربية</th>
                        <th>إسم المدينة بالإنجليزية</th>
                        <th>سعر التوصيل</th>
                        <th>حالة المدينة</th>
                        <th>العمليات المتاحة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp

                    @foreach($cities as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->ar_name}}</td>
                            <td>{{$row->en_name}}</td>
                            <td>{{$row->delivery_price}} ريال </td>
                            <td>
                                @if($row->is_active ==1)
                                    <span style="margin: auto;" class="label label-success">مفعلة</span>
                                @else
                                    <span style="margin: auto;" class="label label-danger">غير مفعلة</span>
                                @endif
                            </td>
                            <td style="width: 150px;">
                                @if($row->is_active == 1)
                                    <a href="javascript:;" data-id="{{$row->id}}" data-action="suspend" data-url="{{route('cities.suspendOrActivate')}}" class="suspendOrActivate label label-danger">حظر</a>
                                @else
                                    <a href="javascript:;" data-id="{{$row->id}}" data-action="activate" data-url="{{route('cities.suspendOrActivate')}}" class="suspendOrActivate label label-success">تفعيل</a>
                                @endif
                                <a href="{{route('cities.edit',$row->id)}}" class="label label-warning">تعديل</a>
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
            var action = $(this).attr('data-action');
            var text = '';
            var type = '';
            var confirmButtonClass = '';

            if(action=='suspend'){
                text = 'هل تريد حظر المدينة فعلا ؟';
                type = 'error';
                confirmButtonClass = 'btn-danger waves-effect waves-light';

            }else{
                text = 'هل تريد تفعيل المدينة فعلا ؟';
                type = 'success';
                confirmButtonClass = 'btn-success waves-effect waves-light';
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
                                    $toastlast = $toast

                                    function pageRedirect() {
                                        window.location.href ='{{route('cities.index')}}';
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
        })


    </script>

@endsection
