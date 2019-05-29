@extends('admin.layout.master')
@section('title','الصلاحيات والمهام')




@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <a href="{{ route('roles.create') }}" class="btn btn-custom dropdown-toggle waves-effect waves-light">
                    إضافة دور جديد
                    <span class="m-l-5"><i class="fa fa-plus"></i></span>
                </a>

            </div>

            <h4 class="page-title">الأدوار</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">قائمة المهام المتاحة</h4>


                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>

                        <th>م</th>
                        <th>الإسم </th>
                        <th>تاريخ الإنشاء</th>
                        <th>عدد المسجلين بالصلاحيه</th>
                        <th>خيارات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp

                    @foreach($roles as $role)
{{----}}
                    <tr>
                    {{--{{ config('app.locale') == 'ar' ? $role->title: $role->title_en }}--}}
                    <td>{{$loop->iteration}}</td>
                    <td>{{$role->title}}</td>
                    <td>{{$role->created_at}}</td>
{{----}}
                    <td>{{$role->users->count()}}</td>
{{----}}
                    <td>
{{----}}
                    <a href="{{ route('roles.edit',$role->id) }}"
                    class="btn btn-xs waves-effect btn-primary">
                    تعديل
                    </a>
{{----}}
{{----}}
                    <a href="javascript:;" id="elementRow{{ $role->id }}" data-id="{{ $role->id }}" data-url="{{ route('roles.destroy', $role->id) }}"
                    class="removeElement btn btn-xs waves-effect btn-danger">
                    حذف
                    </a>
{{----}}
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
            var $tr = $(this).closest($('#elementRow' + id).parent().parent());
            swal({
                title: "حذف الدور؟",
                text: "هل تريد حذف الدور بالفعل ؟",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                closeOnConfirm: true,
                closeOnCancel: true,
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: ' {{ route('role.delete') }}',
                        data: {id: id},
                        dataType: 'json',
                        success: function (data) {
                            if (data.status == true) {
                                var shortCutFunction = 'success';
                                var msg = data.message;
                                var title ='نجاح';
                                toastr.options = {
                                    positionClass: 'toast-top-center',
                                    onclick: null,
                                    showMethod: 'slideDown',
                                    hideMethod: "slideUp",

                                };
                                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                                $toastlast = $toast;
                                $tr.find('td').fadeOut(500, function () {
                                    $tr.remove();
                                });
                            } else if (data.status == false) {
                                var shortCutFunction = 'error';
                                var msg = data.message;
                                var title = "خطأ";
                                toastr.options = {
                                    positionClass: 'toast-top-center',
                                    onclick: null,
                                    showMethod: 'slideDown',
                                    hideMethod: "slideUp",

                                };
                                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                                $toastlast = $toast;
                            }


                        }
                    });
                } else {

                    swal({
                        title: "تم الالغاء",
                        text: "انت لغيت عملية الحذف تقدر تحاول فى اى وقت :)",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "موافق",
                        confirmButtonClass: 'btn-info waves-effect waves-light',
                        closeOnConfirm: false,
                        closeOnCancel: false

                    });

                }
            });
        });

    </script>



@endsection
