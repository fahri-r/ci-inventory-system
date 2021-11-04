<?= $this->extend('base') ?>

<?= $this->section('header') ?>
<link rel="stylesheet" href="<?= base_url('assets/vendors/simple-datatables/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendors/sweetalert2/sweetalert2.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Manage Categories
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
                    <h3>Manage Categories</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $c) : ?>
                                <tr>
                                    <td><?= $c['name'] ?></td>
                                    <td>

                                        <?php if ($c['active']) : ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="categories/<?= $c['id'] ?>/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="categories/<?= $c['id'] ?>" method="POST" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
<?= $this->endSection() ?>

<?= $this->section('footer') ?>

<script src="<?= base_url('assets/vendors/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<?php if (session()->getFlashdata('success')) : ?>
    <script type="text/javascript">
        Swal.fire({
            icon: "success",
            title: "<?= session()->getFlashdata('success'); ?>"
        })
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('fail')) : ?>
    <script type="text/javascript">
        Swal.fire({
            icon: "error",
            title: "<?= session()->getFlashdata('fail'); ?>"
        })
    </script>
<?php endif; ?>

<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js') ?>"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>