<?= $this->extend('base') ?>

<?= $this->section('header') ?>
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/choices.js/choices.min.css') ?>" />
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Manage Company
<?= $this->endSection() ?>

<?= $this->section('content') ?>
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
                    <h3>Manage Company</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/company">Company</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Company</li>
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
                                                    <label for="cName">Company Name</label>
                                                    <input type="text" id="cName" class="form-control" name="cName">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="chargeAmount">Charge Amount (%)</label>
                                                    <input type="text" id="chargeAmount" class="form-control" name="chargeAmount">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="vatCharge">Vat Charge (%)</label>
                                                    <input type="text" id="vatCharge" class="form-control" name="vatCharge">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea type="text" id="address" class="form-control" name="address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" id="phone" class="form-control" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" id="country" class="form-control" name="country">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="currency">Currency</label>
                                                    <select id="currency" class="choices form-select">
                                                        <option value="square">Square</option>
                                                        <option value="rectangle">Rectangle</option>
                                                        <option value="rombo">Rombo</option>
                                                        <option value="romboid">Romboid</option>
                                                        <option value="trapeze">Trapeze</option>
                                                        <option value="traible">Triangle</option>
                                                        <option value="polygon">Polygon</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<script src="<?php echo base_url('assets/vendors/choices.js/choices.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/pages/form-element-select.js') ?>"></script>
<?= $this->endSection() ?>