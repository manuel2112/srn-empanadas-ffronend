<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Empanadas</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between mb-2">
            <h1 class="h3 mb-3">Empanadas </h1>
            <button class="btn btn-primary" onclick="storeData()"><i class="fa-solid fa-plus"></i> Agregar</button>
        </div>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Relleno</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="dataTableBody">
            </tbody>
        </table>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?php echo base_url('js/process.js'); ?>"></script>
<script>
    getList()
</script>
<?= $this->endSection() ?>