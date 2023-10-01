@extends('Dashboard.layout.Dashboard_Layout')

@section('content')
    <div class="md-card-content snipcss-xUXiZ" style="margin-top: 3em;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="heading_a">Please Fill All Fields</h3>

        <hr>

        <form method="post" action="{{ route('subject.store') }}">
            @csrf

            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-2 uk-row-first mb-5">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <input type="text" name="subject_name" placeholder="Subject Name" class="md-input"
                                value="{{ old('subject_name') }}">
                        </div>
                        @error('subject_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <input type="text" name="academic_subject_code" placeholder="Academic Subject Code"
                                class="md-input" value="{{ old('academic_subject_code') }}">
                        </div>
                        @error('academic_subject_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <select name="department_id" class="md-input">
                                <option value="0">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('department_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <select name="category_id" class="md-input">
                                <option value="0">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <select name="professor_id" class="md-input">
                                <option value="">Select Professor</option>
                                @foreach ($professors as $professor)
                                    <option value="{{ $professor->id }}"
                                        {{ old('professor_id') == $professor->id ? 'selected' : '' }}>
                                        {{ $professor->professor_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('professor_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="uk-width">

                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <textarea name="description" class="md-input" style="width: 100%;" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="uk-form-row" style="margin-top: 2em">
                        <div class="uk-input-group">
                            <input type="submit" class="md-btn md-btn-success" name="create_subject"
                                value="Create Subject">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
