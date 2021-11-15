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
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                                <form class="form form-vertical" enctype="multipart/form-data" action="{{ route('products.store') }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="image">Product Image</label>
                                                    <input class="form-control {{ $errors->first('image') ? 'is-invalid' : '' }}" type="file" id="image" name="image" accept=".jpg, .png, .jpeg">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('image') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Product Name</label>
                                                    <input type="text" id="name"
                                                        class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                                        name="name">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sku">SKU</label>
                                                    <input type="text" id="sku"
                                                        class="form-control {{ $errors->first('sku') ? 'is-invalid' : '' }}"
                                                        name="sku">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('sku') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" id="price"
                                                        class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}"
                                                        name="price">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('price') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="qty">Quantity</label>
                                                    <input type="text" id="qty"
                                                        class="form-control {{ $errors->first('qty') ? 'is-invalid' : '' }}"
                                                        name="qty">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('qty') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="attributeValue">Attribute Value</label>
                                                    <select class="choices form-select multiple-remove"
                                                        multiple="multiple" id="attributeValue" name="attributeValue[]">
                                                        @foreach ($attributes as $a)
                                                        <optgroup label="{{ $a->name }}">
                                                            @foreach ($attributeValues as $av)
                                                            @if ($a->id == $av->attribute_id)
                                                            <option value="{{ $av->id }}">{{ $av->name }}</option>
                                                            @endif
                                                            @endforeach
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                    <p style="color: red">
                                                        {{ $errors->first('attributeValue') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="brand">Brand</label>
                                                    <select id="brand"
                                                        class="choices form-select {{ $errors->first('brand') ? 'is-invalid' : '' }}"
                                                        name="brand">
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brands as $b)
                                                        <option value="{{ $b->id }}">{{ $b->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <p style="color: red">
                                                        {{ $errors->first('brand') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select id="category"
                                                        class="choices form-select {{ $errors->first('category') ? 'is-invalid' : '' }}"
                                                        name="category">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <p style="color: red">
                                                        {{ $errors->first('category') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="store">Store</label>
                                                    <select id="store"
                                                        class="choices form-select {{ $errors->first('store') ? 'is-invalid' : '' }}"
                                                        name="store">
                                                        <option value="">Select Store</option>
                                                        @foreach ($stores as $s)
                                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <p style="color: red">
                                                        {{ $errors->first('store') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="availability">Availability</label>
                                                    <select id="availability"
                                                        class="form-select {{ $errors->first('availability') ? 'is-invalid' : '' }}"
                                                        name="availability">
                                                        <option value="">Select Availability</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    <p style="color: red">
                                                        {{ $errors->first('availability') }}
                                                    </p>
                                                </div>
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