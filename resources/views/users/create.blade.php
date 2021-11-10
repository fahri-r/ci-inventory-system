@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ url('assets/vendors/choices.js/choices.min.css') }}" />
@endsection

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="group">Group</label>
                                                    <select id="group"
                                                        class="choices form-select {{ $errors->first('group') ? 'is-invalid' : '' }}"
                                                        name="group">
                                                        <option value="">Select Group</option>
                                                        @foreach ($groups as $g)
                                                        <option value="{{ $g->id }}">{{ $g->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <p style="color: red">
                                                        {{ $errors->first('group') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input type="text" id="firstname"
                                                        class="form-control {{ $errors->first('firstname') ? 'is-invalid' : '' }}"
                                                        name="firstname">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('firstname') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" id="lastname"
                                                        class="form-control {{ $errors->first('lastname') ? 'is-invalid' : '' }}"
                                                        name="lastname">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('lastname') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email"
                                                        class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                                        name="email">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password"
                                                        class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                                        name="password">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="password" id="password_confirmation"
                                                        class="form-control {{ $errors->first('password_confirmation') ? 'is-invalid' : '' }}"
                                                        name="password_confirmation">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('password_confirmation') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" id="phone"
                                                        class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}"
                                                        name="phone">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('phone') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="male" value="1">
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="female" value="0">
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                                <p style="color: red">
                                                    {{ $errors->first('gender') }}
                                                </p>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Vertical form layout section end -->

    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
        </div>
    </footer>
</div>
@endsection

@section('script')
<script src="{{ url('assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ url('assets/js/pages/form-element-select.js') }}"></script>
@endsection