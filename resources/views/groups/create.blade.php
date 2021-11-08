@extends('layouts.main')

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
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/groups">Groups</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Group</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">

                                <form class="form form-vertical" method="POST" action="{{ route('groups.store') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Group Name</label>
                                                    <input type="text" id="name"
                                                        class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                                        name="name">
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-lg">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Create</th>
                                                            <th>Update</th>
                                                            <th>View</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-bold-500">Users</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createUser" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateUser" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewUser" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteUser" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Groups</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createGroup"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateGroup"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewGroup" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteGroup"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Brands</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createBrand"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateBrand"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewBrand" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteBrand"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Categories</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createCategory"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateCategory"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewCategory"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteCategory"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Stores</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createStore"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateStore"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewStore" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteStore"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Attributes</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createAttribute"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateAttribute"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewAttribute"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteAttribute"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Products</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createProduct"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateProduct"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewProduct"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteProduct"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Orders</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="createOrder"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateOrder"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewOrder" class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="deleteOrder"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Company</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="" class="form-check-input" disabled>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateCompany"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="" class="form-check-input" disabled>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="" class="form-check-input" disabled>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Profile</td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="" class="form-check-input" disabled>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="updateProfile"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="viewProfile"
                                                                            class="form-check-input">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-bold-500">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permission[]"
                                                                            value="" class="form-check-input" disabled>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p style="color: red">
                                                    {{ $errors->first('permission') }}
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
                                <!-- Table with outer spacing -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->

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