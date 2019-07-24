@extends('admin.layout.master')
@section('title','تفاصيل القطعة')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <button onclick="window.history.back();"  class="btn btn-custom dropdown-toggle waves-effect waves-light">
                    رجوع
                    <span class="m-l-5"><i class="fa fa-arrow-left"></i></span>
                </button>

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

                                        <a href="{{route('admin.partimage.edit',$part_image->id)}}"  class="label label-danger">تعديل</a>
                                        <a  id="elementRow{{$part_image->id}}" href="javascript:;" data-id="{{$part_image->id}}"  class="removeElement label label-danger">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form id="UpdateImageForm" data-parsley-validate novalidate method="POST" action="{{route('ajax.update.partImage')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div id="updateImageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">تعديل الصورة</h4>
                                            </div>
                                            <div class="modal-body">

                                                {{--<input type="hidden" id="idHolder">--}}


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group no-margin">
                                                            <label for="field-7" class="control-label">الإسم بالعربية</label>
                                                            <input type="text" id="ar_name" name="ar_name" class="form-control" placeholder="إسم القطعة بالعربية" required data-parsley-required-message="هذا الحقل مطلوب">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group no-margin">
                                                            <label for="field-7" class="control-label">الإسم بالإنجليزية</label>
                                                            <input type="text" id="en_name" name="en_name" class="form-control" placeholder="إسم القطعة بالإنجليزية" required data-parsley-required-message="هذا الحقل مطلوب">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group no-margin">
                                                            <label for="field-7" class="control-label">الكود</label>
                                                            <input type="text" id="code" name="code" class="form-control" placeholder="الكود" required data-parsley-required-message="هذا الحقل مطلوب">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group no-margin">
                                                            <label for="field-7" class="control-label">رقم القطعة</label>
                                                            <input type="number" id="number" name="number" class="form-control" placeholder="رقم القطعة" min="1" required data-parsley-required-message="هذا الحقل مطلوب">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group no-margin">
                                                            <label for="field-7" class="control-label">تبديل صورة القطعة</label>

                                                            <input  id="image" name="image" type="file"
                                                                   class="dropify"
                                                                   data-max-file-size="6M"
                                                                   data-allowed-file-extensions="png gif jpg jpeg"
                                                                   data-errors-position="inside"
                                                                   data-show-remove="false"
                                                                   data-default-file=""
                                                            />
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">إلغاء</button>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">تعديل</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->
                            </form>
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



        // $('body').on('click', '.UpdatePartImage', function () {
        //     var id = $(this).attr('data-id');
        //     var imageObject = $(this).attr('data-object');
        //     $('#UpdateImageForm').append('<input type="hidden" name="id" value="'+id+'">');
        //     var ar_name = JSON.parse(imageObject).ar_name;
        //     var en_name = JSON.parse(imageObject).en_name;
        //     var code = JSON.parse(imageObject).code;
        //     var number = JSON.parse(imageObject).number;
        //     var image = $(this).attr('data-image');
        //
        //
        //     $('#ar_name').val(ar_name);
        //     $('#en_name').val(en_name);
        //     $('#code').val(code);
        //     $('#number').val(number);
        //     $('#image').attr("data-default-file",image);
        //
        //
        //
        //
        //     $('#UpdateImageForm').on('submit',function (e) {
        //         e.preventDefault();
        //         var form = $(this);
        //         form.parsley().validate();
        //         if (form.parsley().isValid()) {
        //             var formData = new FormData(this);
        //             $.ajax({
        //                 type: 'POST',
        //                 url: $(this).attr('action'),
        //                 data: formData,
        //                 cache: false,
        //                 contentType: false,
        //                 processData: false,
        //                 success: function (data) {
        //
        //                     if (data.status === true) {
        //
        //                         var title = data.title;
        //                         var msg = data.message;
        //                         toastr.options = {
        //                             positionClass : 'toast-top-left',
        //                             onclick:null
        //                         };
        //                         var $toast = toastr['success'](msg,title);
        //                         $toastlast = $toast;
        //                         $('#UpdateImageForm').each(function () {
        //                             this.reset();
        //                         });
        //
        //
        //                     } else {
        //                         var title = data.title;
        //                         var msg = data.message;
        //                         toastr.options = {
        //                             positionClass : 'toast-top-left',
        //                             onclick:null
        //                         };
        //                         var $toast = toastr['error'](msg,title);
        //                         $toastlast = $toast;
        //
        //                     }
        //                 },
        //                 error: function (data) {
        //
        //                 }
        //             });
        //         }
        //
        //     })
        //
        // });
    </script>


@endsection
