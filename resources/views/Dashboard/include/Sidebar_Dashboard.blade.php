<aside>
    <div class="body-overlay"></div>
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('public-images/Chance-logo.png') }}" style="width: 8em;height: fit-content;" />
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="{{ route('admin.index') }}" class="dashboard"><i
                        class="material-icons">dashboard</i><span>Dashboard</span></a>
            </li>

            <li class="dropdown">
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">supervisor_account</i><span>Admin</span></a>
                <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                    <li>
                        <a href="{{ route('admin.create') }}">Add Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.show-admins') }}">All Admins</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">book</i><span>Subjects</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                    <li>
                        <a href="{{ route('subject.index') }}">All Subjects</a>
                    </li>
                    <li>
                        <a href="{{ route('subject.create') }}">Add Subjects</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="dropdown">
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">equalizer</i>

                    <span>chart</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">extension</i><span>ui element</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">border_color</i><span>forms</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">grid_on</i><span>tables</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu6">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">content_copy</i><span>Pages</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#"><i class="material-icons">date_range</i><span>copy</span></a>
            </li>

            <li class="">
                <a href="#"><i class="material-icons">library_books</i><span>Calender</span></a>
            </li> --}}
        </ul>
    </nav>
</aside>
