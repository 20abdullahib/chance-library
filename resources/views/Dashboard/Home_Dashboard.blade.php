@extends('Dashboard.layout.Dashboard_Layout')

@section('content')
    <!-- Page Content  -->
    {{-- <div id="content-dashboard"> --}}
    <div class="main-content">
        @include('Dashboard.include.success')
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-warning">
                            <i class="material-icons">manage_accounts</i>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Admins</strong></p>
                        <h3 class="card-title">{{ count($Admins) }}</h3>
                    </div>
                    {{-- <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="#pablo">See detailed report</a>
                            </div>
                        </div> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-rose">
                            <span class="material-icons">
                                description
                            </span>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>files</strong></p>
                        <h3 class="card-title">{{count($materials)}}</h3>
                    </div>
                    {{-- <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Product-wise sales
                            </div>
                        </div> --}}

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-success">
                            <span class="material-icons"> people </span>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Users</strong></p>
                        <h3 class="card-title">???</h3>
                    </div>
                    {{-- <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> Weekly sales
                            </div>
                        </div> --}}
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <div class="icon icon-info">
                                <span class="material-icons"> follow_the_signs </span>
                            </div>
                        </div>
                        <div class="card-content">
                            <p class="category"><strong>Followers</strong></p>
                            <h3 class="card-title">+245</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-12" style="font-size: medium;">
                <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Chance Stats</h4>
                        {{-- <p class="category">New employees on 15th December, 2016</p> --}}
                    </div>
                    <div class="card-content table-responsive ">
                        <table class="table table-hover text-center">
                            <thead class="text-primary">
                                <tr>
                                    <th>Admin ID</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Admins as $Admin)
                                    <tr>
                                        <td>{{ $Admin->admin_id }}</td>
                                        <td>{{ $Admin->name }}</td>
                                        <td>{{ $Admin->rank }}</td>
                                        <td>
                                            {{-- <a href="{{ route('dashboard.destroy', $Admin->id) }}"
                                                    class="btn btn-outline-danger btn-sm"
                                                    style="font-size: medium !important;">
                                                    Delete
                                                </a> --}}

                                            <form action="{{ route('admin.destroy', $Admin->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Activities</h4>
                    </div>
                    <div class="card-content">
                        <div class="streamline">
                            <div class="sl-item sl-primary">
                                <div class="sl-content">
                                    <small class="text-muted">5 mins ago</small>
                                    <p>Williams has just joined Project X</p>
                                </div>
                            </div>
                            <div class="sl-item sl-danger">
                                <div class="sl-content">
                                    <small class="text-muted">25 mins ago</small>
                                    <p>
                                        Jane has sent a request for access to the project
                                        folder
                                    </p>
                                </div>
                            </div>
                            <div class="sl-item sl-success">
                                <div class="sl-content">
                                    <small class="text-muted">40 mins ago</small>
                                    <p>Kate added you to her team</p>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-content">
                                    <small class="text-muted">45 minutes ago</small>
                                    <p>John has finished his task</p>
                                </div>
                            </div>
                            <div class="sl-item sl-warning">
                                <div class="sl-content">
                                    <small class="text-muted">55 mins ago</small>
                                    <p>Jim shared a folder with you</p>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-content">
                                    <small class="text-muted">60 minutes ago</small>
                                    <p>John has finished his task</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <nav class="d-flex">
                            <ul class="m-0 p-0">
                                <li>
                                    <a href="#"> Home </a>
                                </li>
                                <li>
                                    <a href="#"> Company </a>
                                </li>
                                <li>
                                    <a href="#"> Portfolio </a>
                                </li>
                                <li>
                                    <a href="#"> Blog </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <p class="copyright d-flex justify-content-end">
                            &copy 2023 Design by
                            <a href="https://front-end-designer.netlify.app/">Front-End-Designer
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    {{-- </div> --}}
@endsection
