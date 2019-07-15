@extends('website.layouts.master')

@section('styles')
<style>
    .parsley-error , .parsley-errors-list {
        color: red;
    }
</style>
@endsection

@section('content')
    <section class="contact all-sections" id="section1">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-5 col-sm-4 col-xs-12">
                    <div class="contact-right">
                        <h3 class="h3-after">اتصل بنا</h3>

                        <form class="form2" data-parsley-validate novalidate id="contactform" method="post" action="{{route('web.contact.post')}}">
                            {{csrf_field()}}
                            <div class="form-data">
                                <label>الاسم</label>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" required data-parsley-required-message="هذا الحقل مطلوب">
                                    <span class="focus-border"><i></i></span>
                                </div>
                            </div>
                            <div class="form-data">
                                <label>نص الرسالة</label>
                                <div class="form-group">
                                    <textarea name="text" rows="4" cols="95" class="form-control input-lg" data-fv-field="inbox" placeholder="اكتب رسالتك..." required data-parsley-required-message="هذا الحقل مطلوب"></textarea>
                                    <span class="focus-border"><i></i></span>
                                </div>
                            </div>
                            <button type="submit">ارسال</button>
                        </form>

                    </div>
                </div>

                <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12">
                    <div class="contact-left">
                        <div class="mobile">
                            <a class="calling tt-hover" href="tel:18888888888" aria-label="اتصل بنا!">
                                <img src="{{asset('website/img/call.svg')}}" class="wow zoomIn">
                            </a>

                            <a href="mailto:reem@sayarty.com" class="absol-in mail tt-hover" aria-label="ارسل رساله"> <img src="{{asset('website/img/mailto.svg')}}" class="wow slideInUp"> </a>

                            <div id="mapholder"></div>
                            <a aria-label="اللوكيشن" target="_blank" href="https://www.google.com/maps/place/%D8%A7%D9%84%D9%82%D8%B5%D9%8A%D9%85+%D8%A7%D9%84%D8%B3%D8%B9%D9%88%D8%AF%D9%8A%D8%A9%E2%80%AD/@25.9721749,44.2385021,8z/data=!3m1!4b1!4m5!3m4!1s0x157f59ad6fe2be3b:0xe1fb621d3b0d00aa!8m2!3d25.8274886!4d42.8637875" class="absol-in locat tt-hover"> <img src="{{asset('website/img/location2.svg')}}" class="wow slideInUp"> </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#contactform').on('submit', function (e) {
            e.preventDefault();
            var form = $(this);
            form.parsley().validate();
            if (form.parsley().isValid()) {
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        if (data.status === true) {

                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };
                            var $toast = toastr['success'](msg,title);
                            $toastlast = $toast;
                            $('#contactform').each(function () {
                                this.reset();
                            });


                        } else {
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };
                            var $toast = toastr['error'](msg,title);
                            $toastlast = $toast;

                        }
                    },
                    error: function (data) {

                    }
                });
            }
        });
    </script>


@endsection
