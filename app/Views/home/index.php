<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>

        <img src="<?php echo base_url('img/logo-empanada.png'); ?>" class="mt-5 mx-auto d-block img-fluid" />
    </div>
</main>
<?= $this->endSection() ?>