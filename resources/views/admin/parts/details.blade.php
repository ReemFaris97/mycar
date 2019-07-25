@extends('admin.layout.master')
@section('title','تفاصيل القطعة')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <a href="{{route('parts.index')}}"  class="btn btn-custom dropdown-toggle waves-effect waves-light">
                    رجوع
                    <span class="m-l-5"><i class="fa fa-arrow-left"></i></span>
                </a>

            </div>

            <h4 class="page-title">بيانات القطعة</h4>
        </div>
    </div><!--End Page-Title -->


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h3 class="header-title m-t-0 m-b-30">بيانات القطعة</h3>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="col-md-4">
                            <h4>القسم الرئيسي</h4>
                            <h5 style="font-weight: 600;">{{$part->subCategory->category->ar_name }}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>القسم الفرعي:</h4>
                            <h5 style="font-weight: 600;">{{$part->subCategory->ar_name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>الإسم بالعربية:</h4>
                            <h5 style="font-weight: 600;">{{$part->ar_name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>الإسم بالإنجليزية:</h4>
                            <h5 style="font-weight: 600;">{{$part->en_name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>نوع القطعة</h4>
                            <h5 style="font-weight: 600;">
                            @if($part->code == null)
                                بها قطع آخرى
                                @else
                                رئيسية
                                @endif
                            </h5>
                        </div>



                        <div class="col-md-4">
                            <h4>صورة القطعة</h4>
                            <div  style="width: 200px; height: 150px;">
                                    <a href="{{getimg($part->image)}}" class="image-popup" title="Screenshot-1">
                                        <img width="200" height="150" src="{{getimg($part->image)}}" class="thumb-img" alt="work-thumbnail">
                                    </a>
                            </div>
                        </div>

                        @if($part->code== null)
                        <h3 class="header-title m-t-0 m-b-30">بيانات القطع الفرعية</h3>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الإسم بالعربية</th>
                                    <th>الإسم بالإنجليزية</th>
                                    <th>الكود</th>
                                    <th>رقم القطعة</th>
                                    <th>الصورة</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($part->part_images as $part_image)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$part_image->ar_name}}</td>
                                    <td>{{$part_image->en_name}}</td>
                                    <td>{{$part_image->code}}</td>
                                    <td>{{$part_image->number}}</td>
                                    <td>    <a data-fancybox="gallery"
                                               href="{{getimg($part_image->image)}}">
                                            <img style=" border-radius: 50%; height: 49px;"
                                                 src="{{getimg($part_image->image)}}"/>
                                        </a>
                                    </td>
                                    <td>

                                        <a href="{{route('part-image.edit',$part_image->id)}}"  class="label label-danger">تعديل</a>
                                        <a  id="elementRow{{$part_image->id}}" href="javascript:;" data-id="{{$part_image->id}}" data-url="{{route('part-image.destroy',$part_image->id)}}"  class="removeElement label label-danger">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        @endif

                    </div>
                </div> <!--End of row-->
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
    <script type="text/javascript">

        $(document).ready(function() {

            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });

        $('.dropify').dropify({
            messages: {
                'default': 'إضغط هنا او اسحب وافلت لتبديل الصورة',
                'replace': 'إسحب وافلت او إضغط للتعديل',
                'remove': 'حذف',
                'error': 'حدث خطأ ما'
            },
            error: {
                'fileSize': 'حجم الصورة كبير (6M max).',
                'fileExtension': 'نوع الصورة غير مدعوم (png - gif - jpg - jpeg)',
            }
        });

        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            var tr = $(this).closest($('#elementRow' + id).parent().parent());

            swal({
                    title: "هل انت متأكد؟",
                    text: 'هل تريد حذف القطعة فعلا ؟',
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
