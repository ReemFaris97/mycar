@extends('admin.layout.master')
@section('title','المقترحات')

@section('styles')

@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <a href="{{route('proposals.create')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                    إضافة مقترح جديد
                    <span class="m-l-5"><i class="fa fa-plus"></i></span>
                </a>

            </div>

            <h4 class="page-title">المقترحات</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">كل المقترحات</h4>


                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>المقترح باللغة العربية</th>
                        <th>المقترح باللغة الإنجليزية</th>
                        <th>الصورة</th>
                        <th>عدد التعليقات</th>
                        <th>عدد الإعجابات</th>
                        <th>عدد لم يعجبني</th>
                        <th>العمليات المتاحة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp

                    @foreach($proposals as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->ar_name}}</td>
                            <td>{{$row->en_name}}</td>
                            <td>
                                <a data-fancybox="gallery"
                                   href="{{getimg($row->image)}}">
                                    <img style="width: 25%; border-radius: 50%; height: 80px;"
                                         src="{{getimg($row->image)}}"/>
                                </a>

                            </td>
                            <td>{{$row->comments->count()}}</td>
                            <td>{{$row->likes->count()}}</td>
                            <td>{{$row->dislikes->count()}}</td>
                            <td style="width: 150px;">
                                <a href="{{route('proposals.show',$row->id)}}" class="label label-warning">تفاصيل</a>
                                <a href="{{route('proposals.edit',$row->id)}}" class="label label-primary">تعديل</a>
                                <a  id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}"  data-url="{{route('proposals.destroy',$row->id)}}" class="removeElement label label-danger">حذف</a>
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
                    text: 'هل تريد حذف المقترح فعلا ؟',
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

