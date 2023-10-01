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
        <form method="post" action="{{ route('admin.store') }}">
            @csrf
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-2 uk-row-first mb-5">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <input type="text" name="name" placeholder="Admin Full Name" class="md-input">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled">
                            <label>Academic Number of the Admin</label>
                            <input type="text" name="admin_id" class="md-input label-fixed">
                        </div>
                        @error('admin_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <input type="email" name="email" placeholder="Admin Email" class="md-input">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled">
                            <label>Admin Gender</label>
                            <select name="Gender" class="md-input">
                                <option>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        @error('Gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="uk-form-row">
                        <div class="md-input-wrapper">
                            <input type="password" name="password" placeholder="Admin Password" class="md-input">
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="uk-width-medium-2-2 uk-grid-margin uk-row-first">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled">
                            <label>Admin Rank</label>
                            <select name="rank" class="md-input">
                                <option value="">Select Rank</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        @error('rank')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-input-group">
                            <input type="submit" class="md-btn md-btn-success" name="add_admin" value="Create Admin">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
