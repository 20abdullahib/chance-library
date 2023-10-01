@extends('Dashboard.layout.Dashboard_Layout')


@section('content')
    <div style="overflow: auto;">
        @include('Dashboard.include.success')
        <form action="{{-- route('subject.search') --}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-hover text-center table-bordered">
            <thead class="text-primary">
                <tr>
                    <th>Subject Name</th>
                    <th>Academic Subject code</th>
                    <th>Department</th>
                    <th>Category</th>
                    <th>Professor</th>
                    {{-- <th>Material</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        {{-- <form id="showForm{{ $subject->id }}" action="{{ route('subject.show', $subject->id) }}"
                            method="GET">
                            @csrf
                        </form> --}}

                        <form id="deleteForm{{ $subject->id }}" action="{{ route('subject.destroy', $subject->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>

                        <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <td class="editable" onclick="makeEditable(this)">
                                <span>{{ $subject->subject_name }}</span>
                                <input type="text" value="{{ $subject->subject_name }}" name="subject_name">
                            </td>

                            <td class="editable" onclick="makeEditable(this)">
                                <span>{{ $subject->academic_subject_code }}</span>
                                <input type="text" value="{{ $subject->academic_subject_code }}"
                                    name="academic_subject_code">
                            </td>

                            <td>
                                <div class="select-container">
                                    <select name="department_id" class="select-styled">
                                        <option value="" disabled selected>{{ $subject->department->department_name }}
                                        </option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">
                                                {{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="select-container">
                                    <select name="category_id" class="select-styled">
                                        <option value="" disabled selected>{{ $subject->category->category_name }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="select-container">
                                    <!--<select name="professor_id" class="select-styled">-->
                                    <!--    <option value="" disabled selected>{{-- $subject->professor->professor_name --}}-->
                                    <!--    </option>-->
                                    <!--    @foreach ($professors as $professor)-->
                                    <!--        <option value="{{-- $professor->id --}}">-->
                                    <!--            {{-- $professor->professor_name --}}</option>-->
                                    <!--    @endforeach-->
                                    <!--</select>-->
                                    
                                <select name="professor_id" class="select-styled">
                                    @if ($subject->professor)
                                        <option value="{{ $subject->professor->id }}" selected>
                                            {{ $subject->professor->professor_name }}
                                        </option>
                                    @else
                                        <option value="" disabled selected>Select Professor</option>
                                    @endif
                                
                                    @foreach ($professors as $professor)
                                        <option value="{{ $professor->id }}">
                                            {{ $professor->professor_name }}
                                        </option>
                                    @endforeach
                                </select>

                                </div>
                            </td>

                            <td>
                                {{-- <button class="btn btn-info show-btn"
                                    onclick="activateShowForm({{ $subject->id }})">Show</button> --}}
                                    <a class="btn btn-info show-btn" href="{{route('subject.show', $subject->id)}}">Show</a>
                                <button class="btn btn-warning update-btn"
                                    data-subject-id="{{ $subject->id }}">Update</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="activateDeleteForm({{ $subject->id }})">Delete</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>

        </table>
        @include('Dashboard.include.pagination')
    </div>
@endsection
