@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ url('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/choices.js/choices.min.css') }}" />
@livewireStyles
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
                            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @livewire('cart')
                    {{-- <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $s)
                            <tr>
                                <td>{{ $s->name }}</td>
                                <td>
                                    @if($s->active)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('stores.edit', ['store'=>$s->id]) }}" class="btn btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('stores.destroy', ['store'=>$s->id]) }}" method="POST"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>

        </section>
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
<script src="{{ url('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>


@if (session('success'))
<script type="text/javascript">
    Swal.fire({
            icon: "success",
            title: "{{ session('success') }}"
        })
</script>
@endif

@if (session('fail'))
<script type="text/javascript">
    Swal.fire({
            icon: "error",
            title: "{{ session('fail') }}"
        })
</script>
@endif

<script src="{{ url('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

@livewireScripts
<script src="{{ url('assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ url('assets/js/pages/form-element-select.js') }}"></script>
@endsection