<!-- Start Top Nav -->
<section class="top-nav">
    <div class="row">

        <div class="col-md-7 col-sm-6 col-xs-5 no-padd-sm">
            <div class="top-r">
                @lang('web.all_spare_genuine')
            </div>
        </div>

        <div class="col-md-5 col-sm-6 col-xs-7 no-padding">
            <ul class="top-l">
                <li>
                    <a href="{{route('web.get.register.supplier')}}">@lang('web.join_as_supplier')</a>
                </li> .

                <!---- if in arabic -->
                <li class="lang">
                    @if(app()->getLocale() == 'ar')
                        <a href="{{route('lang',['en'])}}">Eng</a>
                    @else
                        <a href="{{route('lang',['ar'])}}">ع</a>
                    @endif
                    -
                        @if(app()->getLocale() == 'ar')
                            <span>العربية</span>
                        @else
                            <span>English</span>
                        @endif
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- End Top Nav -->
