<div class="top-navbar">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button type="button" {{-- id="sidebarCollapse"  --}} class="d-xl-block d-lg-block d-md-mone d-none">
                <a href="{{ route('admin.index') }}"><span class="material-icons">arrow_back_ios</span></a>
            </button>
            <div>
                <a class="navbar-brand" href="{{ route('admin.index') }}"> Dashboard </a>
                <a class="navbar-brand" href="{{ route('admin.dashboard.logout') }}"> logout </a>
            </div>
            <button class="d-inline-block d-lg-none ml-auto more-button collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="material-icons">more_vert</span>
            </button>
        </div>
    </nav>
</div>
