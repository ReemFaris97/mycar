@extends('admin.layout.master')
@section('title',$settings_page)

@section('styles')
    <link href="{{asset('admin/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <form action="{{route('setting.store')}}" data-parsley-validate="" novalidate="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Page-Title -->
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('homePage')}}" class="btn btn-custom  waves-effect waves-light"
                            >رجوع<span class="m-l-5"><i
                                        class="fa fa-reply"></i></span>
                            </a>

                        </div>
                        <h4 class="page-title">التحكم ب {{$settings_page}}</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">


                            @foreach($settings as $setting)
                                @if($setting->type == 'text')
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="userName">{{$setting->title}} بالعربية </label>
                                            <input type="text" name="{{$setting->name}}[]" value="{{$setting->ar_value}}" class="form-control"
                                                   required/>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-126 col-xs-12">
                                        <div class="form-group">
                                            <label for="userName">{{$setting->title}} بالإنجليزية </label>
                                            <input type="text" name="{{$setting->name}}[]" value="{{$setting->en_value}}" class="form-control"
                                                   required/>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                @elseif($setting->type == 'textarea')
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="about_app_desc">{{$setting->title}} بالعربية </label>
                                            <textarea id="elm1" name="{{$setting->name}}[]" >{{$setting->ar_value}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="about_app_desc">{{$setting->title}} بالإنجليزية </label>
                                            <textarea id="elm1" name="{{$setting->name}}[]" >{{$setting->en_value}}</textarea>
                                        </div>
                                    </div>
                                @elseif($setting->type == 'url')
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="userName">{{$setting->title}}</label>
                                            <input type="text" name="{{$setting->name}}[]" value="{{$setting->ar_value}}" class="form-control"
                                                   {{--oninput="this.value = Math.abs(this.value)"--}}
                                                   required/>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="col-xs-12">
                                <div class="form-group text-center m-t-20">
                                    <button class="btn btn-primary waves-effect waves-light m-t-20" type="submit">
                                        حفظ
                                    </button>
                                </div>
                            </div>


                    </div><!-- end col -->
                </div>
                <!-- end row -->

    </form>
@endsection


@section('scripts')
    <script src="{{asset('admin/assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/switchery/switchery.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "rtl insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>


@endsection
