@extends('ChanceWebsite.layout.layout')

@section('main-sec')
    <!-- Header-background-markup -->
    <div class="overlay-bg relative">
        <img src="{{asset('assets-chance-website/images/slide/silder-1 (2).jpeg')}}" alt="">
    </div>
    <!-- Header-jumbotron -->
    <div class="space-100"></div>
    <div class="header-text">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
                    <div class="jumbotron">
                        <h1 class="text-white">Chance Digital Library To Save Your Time</h1>
                    </div>
                    <div class="title-bar white">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                    <div class="space-40"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-100"></div>
    <!-- Header-jumbotron-end -->
@endsection

@section('content')
    <section>
        <div class="space-80"></div>
        <div class="container">
            <div class="row"> <!-- Parent row -->
                <!-- Sidebar -->
                <div class="col-xs-12 col-md-2">
                    <aside id="droplist">
                        <h3><i class="icofont icofont-filter"></i> Filter By</h3>
                        <div class="space-30"></div>
                        <div class="sigle-sidebar">
                            <h4>Category</h4>
                            <hr>
                            <ul class="list-unstyled menu-tip">
                                <li>
                                    <button
                                        onclick="window.location.href='{{ route('search.result.filter.all', ['category', 'all']) }}'">
                                        All category
                                    </button>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <button
                                            onclick="window.location.href='{{ route('search.result.filterID', ['category', $category->id]) }}'">
                                            {{ $category->category_name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <div class="space-30"></div>
                        <div class="sigle-sidebar">
                            <h4>Department</h4>
                            <hr>
                            <ul class="list-unstyled menu-tip">
                                <li>
                                    <button
                                        onclick="window.location.href='{{ route('search.result.filter.all', ['department', 'all']) }}'">
                                        All department
                                    </button>
                                </li>
                                @foreach ($departments as $department)
                                    <li>
                                        <button
                                            onclick="window.location.href='{{ route('search.result.filterID', ['department', $department->id]) }}'">
                                            {{ $department->department_name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <div class="space-30"></div>
                        <div class="sigle-sidebar">
                            <h4>Professor</h4>
                            <hr>
                            <ul class="list-unstyled menu-tip">
                                <li>
                                    <button
                                        onclick="window.location.href='{{ route('search.result.filter.all', ['professor', 'all']) }}'">
                                        All professor
                                    </button>
                                </li>
                                @foreach ($professors as $professor)
                                    <li>
                                        <button
                                            onclick="window.location.href='{{ route('search.result.filterID', ['professor', $professor->id]) }}'">
                                            {{ $professor->professor_name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{--  --}}
                        <div class="space-20"></div>
                    </aside>
                </div>
                <!-- end Sidebar-->

                <!-- Content -->
                <div class="col-xs-12 col-md-10 pull-right">
                    <h4>Search Box</h4>
                    <div class="space-5"></div>
                    <form action="{{ route('search.result') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="query" class="form-control"
                                placeholder="Enter what you are looking for">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i
                                        class="icofont icofont-search-alt-2"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="space-30"></div>
                    {{-- reselt number --}}
                    {{-- <p id="reselt_number">
                        Total Results: {{ $count }}</p> --}}
                    {{-- end reselt number --}}
                    <div class="space-30"></div>
                    <hr>
                    <div class="space-20"></div>

                    <!-- Content including the loop -->
                    <div style="display: flex;flex-wrap: wrap;">
                        @foreach ($materials as $material)
                            <div class="col-xs-12 col-md-4 filter-items" id="display_content" data-Allcategory="Allcategory"
                                data-Alldepartment="Alldepartment" data-Allprofessor="Allprofessor"
                                data-department="{{ $material->subject->department->department_name }}"
                                data-category="{{ $material->subject->category->category_name }}"
                                data-professor="{{ optional($material->subject->professor)->professor_name ?? 'N/A' }}">
                                <div class="category-item well yellow">
                                    <div class="media">
                                        <div class="media-body" style="display: flex;">
                                            {{-- <div class="media-left" style="width: 5em;">
                                                <img src="" alt="" style="width: -webkit-fill-available;">
                                            </div> --}}
                                            <div>
                                                <h5 style="font-weight: bold;">{{ $material->subject->subject_name }}</h5>
                                                <h6>Department: {{ $material->subject->department->department_name }}</h6>
                                                <h6>Category: {{ $material->subject->category->category_name }}</h6>
                                                @if ($material->subject && $material->subject->professor)
                                                    <h6>Professor: {{ $material->subject->professor->professor_name }}</h6>
                                                @else
                                                    <h6>Professor: No Professor available</h6>
                                                @endif
                                                <h6>Pdf: {{ $material->pdf_file_name }}</h6>
                                            </div>
                                        </div>
                                        <div style="display: flex;align-items: center;flex-wrap: wrap;">
                                            <a href="{{ $material->pdf_file_download }} " target="blank"
                                                class="btn btn-outline-primary">
                                                <i class="fas fa-download"></i> Download
                                            </a>
                                            <button
                                                data-pdf-link="
                                             {{ $material->pdf_file_link }}
                                                "
                                                class="btn btn-outline-primary view-button">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- End loop -->
                    @include('ChanceWebsite.include.pagination')
                    <div id="file-popup" class="file-popup">
                        <iframe id="file-viewer" class="file-viewer" name="file-viewer"></iframe>
                        <button id="close-button" class="close-button">Close</button>
                    </div>

                    <!--end content-->
                    <div class="space-60"></div>
                </div>
            </div> <!-- End parent row -->
        </div>
        <div class="space-80"></div>
    </section>
@endsection
