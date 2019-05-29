@extends('admin.layout.master')
@section('title','القطع والمنتجات')

@section('styles')

@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <a href="{{route('parts.create')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                    إضافة منتج(قطعة) جديدة
                    <span class="m-l-5"><i class="fa fa-plus"></i></span>
                </a>

            </div>

            <h4 class="page-title">القطع و المنتجات</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">كل القطع</h4>


                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>إسم قطعة الغيار بالعربية</th>
                        <th>إسم قطعة الغيار بالإنجليزية</th>
                        <th>اسم الشركة المصنعة</th>
                        <th>الموديل</th>
                        <th>العمليات المتاحة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp

                    @foreach($parts as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->ar_name}}</td>
                            <td>{{$row->en_name}}</td>
                            <td>{{$row->company_model->company->ar_name}}
                            <td>{{$row->company_model->ar_name}}
                            </td>
                            <td style="width: 150px;">
                                <a href="{{route('parts.edit',$row->id)}}" class="label label-warning">تعديل</a>
                                <a  id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}"  data-url="{{route('parts.destroy',$row->id)}}" class="removeElement label label-danger">حذف</a>
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


        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            var tr = $(this).closest($('#elementRow' + id).parent().parent());

            swal({
                    title: "هل انت متأكد؟",
                    text: 'هل تريد حذف قطعة الغيار فعلا ؟',
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

