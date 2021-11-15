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
                            <li class="breadcrumb-item active" aria-current="page">Show Product</li>
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
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="image">Product Image</label>
                                                    <input type="text" id="image" class="form-control" name="image"
                                                        value="{{ $product->image }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Product Name</label>
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        value="{{ $product->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sku">SKU</label>
                                                    <input type="text" id="sku" class="form-control" name="sku"
                                                        value="{{ $product->sku }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" id="price" class="form-control" name="price"
                                                        value="{{ $product->price }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="qty">Quantity</label>
                                                    <input type="text" id="qty" class="form-control" name="qty"
                                                        value="{{ $product->qty }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="attributeValue">Attribute Value</label>
                                                    <select class="choices form-select multiple" multiple="multiple"
                                                        id="attributeValue" name="attributeValue[]" disabled>
                                                        @foreach ($attributes as $a)
                                                        <optgroup label="{{ $a->name }}">
                                                            @foreach ($attributeValues as $av)
                                                            @if ($a->id == $av->attribute_id)
                                                            <option value="{{ $av->id }}" @foreach ($product->
                                                                attributeValues as $p)
                                                                @if ($p->id == $av->id)
                                                                {{ 'selected' }}
                                                                @endif
                                                                @endforeach
                                                                >{{ $av->name }}</option>
                                                            @endif
                                                            @endforeach
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="brand">Brand</label>
                                                    <select id="brand" class="choices form-select" name="brand"
                                                        disabled>
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brands as $b)
                                                        <option value="{{ $b->id }}" {{ $b->id == $product->brand->id ?
                                                            'selected' : ''}}>{{ $b->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select id="category" class="choices form-select" name="category"
                                                        disabled>
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $c)
                                                        <option value="{{ $c->id }}" {{ $c->id == $product->category->id
                                                            ? 'selected' : ''}}>{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="store">Store</label>
                                                    <select id="store" class="choices form-select" name="store"
                                                        disabled>
                                                        <option value="">Select Store</option>
                                                        @foreach ($stores as $s)
                                                        <option value="{{ $s->id }}" {{ $s->id == $product->store->id ?
                                                            'selected' : ''}}>{{ $s->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="availability">Availability</label>
                                                    <select id="availability" class="form-select" name="availability"
                                                        disabled>
                                                        <option value="">Select Availability</option>
                                                        <option value="1" {{ $product->availability == 1 ? 'selected' :
                                                            ''}}>Yes</option>
                                                        <option value="0" {{ $product->availability == 0 ? 'selected' :
                                                            ''}}>No</option>
                                                    </select>
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