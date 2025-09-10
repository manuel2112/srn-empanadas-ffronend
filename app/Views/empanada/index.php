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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmpanadaModal"><i class="fa-solid fa-plus"></i> Agregar</button>
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

<!-- Modal -->
<div class="modal fade" id="addEmpanadaModal" tabindex="-1" aria-labelledby="addEmpanadaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar empanada</h1>
                <button type="button" class="btn-close" id="close-modal-store" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="storeForm">
                    <div class="form-group">
                        <label for="nameForm">Nombre</label>
                        <input type="text" class="form-control" id="nameForm" placeholder="Nombre..." required>
                        <span class="text-danger" id="nameFormError"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="typeForm">Tipo</label>
                        <input type="text" class="form-control" id="typeForm" placeholder="Horno, frita, etc..." required>
                        <span class="text-danger" id="typeFormError"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="priceForm">Precio</label>
                        <input type="number" class="form-control" id="priceForm" placeholder="Precio..." required>
                        <span class="text-danger" id="priceFormError"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="fillingForm">Relleno</label>
                        <textarea class="form-control" id="fillingForm" rows="3" required></textarea>
                        <span class="text-danger" id="fillingFormError"></span>
                    </div>
                    <div class="form-group d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-primary" onclick="return storeData()">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?php echo base_url('js/process.js'); ?>"></script>
<script>
    getList()
</script>
<?= $this->endSection() ?>