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
                            <li class="breadcrumb-item active" aria-current="page">Show User</li>
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
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="group">Group</label>
                                                    <select id="group" class="choices form-select" name="group" disabled>
                                                        <option value="">Select Group</option>
                                                        @foreach ($groups as $g)
                                                        <option value="{{ $g->id }}" {{ $g->id == $user->group->id ?'selected' : '' }}>{{ $g->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input type="text" id="firstname" class="form-control"
                                                        name="firstname" value="{{ $user->userMeta->firstname }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" id="lastname" class="form-control"
                                                        name="lastname" value="{{ $user->userMeta->lastname }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        value="{{ $user->email }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" id="phone" class="form-control" name="phone"
                                                        value="{{ $user->userMeta->phone }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="male" value="1" {{ $user->userMeta->gender == 1 ?
                                                        'checked' : '' }} disabled>
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="female" value="0" {{ $user->userMeta->gender == 0 ?
                                                        'checked' : '' }} disabled>
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
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