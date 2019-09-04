@extends('admin.layout.master')
@section('title','تفاصيل المدير المساعد')

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

            <h4 class="page-title">البيانات الشخصية</h4>
        </div>
    </div><!--End Page-Title -->


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h3 class="header-title m-t-0 m-b-30">البيانات الشخصية</h3>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="col-md-4">
                            <h4>الإسم</h4>
                            <h5 style="font-weight: 600;">{{$admin->name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>رقم الجوال:</h4>
                            <h5 style="font-weight: 600;">{{$admin->phone}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>البريد الإلكتروني:</h4>
                            <h5 style="font-weight: 600;">{{$admin->email}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>تاريخ الإنشاء:</h4>
                            <h5 style="font-weight: 600;">{{$admin->created_at}}</h5>
                        </div>




                        <div class="col-md-4">
                            <h4>الصورة الشخصية</h4>
                            <div  style="width: 200px; height: 150px;">
                                @if($admin->image)
                                    <a href="{{getimg($admin->image)}}" class="image-popup" title="Screenshot-1">
                                        <img width="200" height="150" src="{{getimg($admin->image)}}" class="thumb-img" alt="work-thumbnail">
                                    </a>
                                @else
                                    <a href="{{asset('admin/assets/images/noimage.png')}}" class="image-popup" title="Screenshot-1">
                                        <img width="200" height="150" src="{{asset('admin/assets/images/noimage.png')}}" class="thumb-img" alt="work-thumbnail">
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h4>تاريخ الإنشاء:</h4>
                            <h5 style="font-weight: 600;">{{$admin->created_at}}</h5>
                        </div>

                        <div class="col-md-8">
                            <h4>الأدوار الممنوحة له</h4>
                            <div  style=" color: black; width: 200px; height: 150px;">
                            <ul>
                                @foreach($admin->roles as $role)
                                    <li>{{$role->title}}</li>
                                @endforeach
                            </ul>
                            </div>
                        </div>

                    </div>
                </div> <!--End of row-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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


    </script>

@endsection
