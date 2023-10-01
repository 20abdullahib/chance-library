<!-- Mainmenu-markup-start -->
<div class="mainmenu-area navbar-fixed-top" data-spy="affix" data-offset-top="10">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="space-10"></div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--Logo-->
                <div>
                    <a href="{{ route('Home.index') }}" class="navbar-left show"><img
                            src="{{ asset('public-images/Chance-logo.png') }}"style="width: 6em;height: 3em;"
                            alt="chance logo"></a>
                    <div class="space-10"></div>
                </div>
            </div>
            <!--Toggle-button-->

            <!--Mainmenu list-->
            <div class="navbar-right in fade" id="mainmenu">
                <ul class="nav navbar-nav nav-white text-uppercase">
                    <li >
                        <a href="{{ route('Home.index') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('search')}}">Matirals</a>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard.checklogin')}}">Admin Login</a>
                    </li>
                    {{-- <li>
                        <a href="#">Staff Login</a>
                    </li>
                    <li>
                        <a href="#">Admin Login</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="space-100"></div>
