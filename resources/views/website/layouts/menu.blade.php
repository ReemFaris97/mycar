<!--Start Navbar-->
<div class="navbar">
    <div class="row">


        <div class="col-md-2 col-sm-2 col-xs-4 no-padding">
            <div class="nav-right">
                <a href="{{route('web.home')}}" class="logo-nav">
                    <img src="{{asset('website/img/logo.png')}}">
                </a>
            </div>
        </div>

        <div class="col-md-7 col-sm-6 col-xs-2 no-padding">
            <div class="right-one">
                <div id="nav-icon1">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="navy">
                    <ul class="nav cf" id="ul1">
                        <li class="{{Request::is('/')?'active':''}}"><a href="{{route('web.home')}}">الرئيسية</a></li>
                        <li class=""><a href="account-information.html">حسابى</a></li>
                        <li class="{{Request::is('about')?'active':''}}"><a href="{{route('web.about')}}">من نحن</a></li>
                        <li class="{{Request::is('/contact')?'active':''}}"><a href="{{route('web.contact')}}">اتصل بنا</a></li>
                    </ul>

                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 no-padding">
            <ul class="nav-left">
                <li>
                    <button class="modal-btn" id="seven">
                        سؤال مباشر
                    </button>
                </li>

                <li>
                    <button class="modal-btn" id="two">
                        اتصل بنا
                    </button>
                </li>
            </ul>
        </div>


    </div>
</div>
<!--End Navbar-->
