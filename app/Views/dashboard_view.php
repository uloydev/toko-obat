<?= $this->extend('template') ?>

<?= $this->section('header') ?>
<div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Summary Data</h6>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="row pb-5 pt-3">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats py-5">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Obat</h5>
                        <span class="h2 font-weight-bold mb-0"><?=$totalObat?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats py-5">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
            <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total Stok Obat</h5>
                <span class="h2 font-weight-bold mb-0"><?=$totalStok?></span>
            </div>
            <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                <i class="ni ni-basket"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats py-5">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
            <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total Log Harga</h5>
                <span class="h2 font-weight-bold mb-0"><?=$totalLogHarga?></span>
            </div>
            <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                <i class="ni ni-align-left-2"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats py-5">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Log Stok</h5>
                        <span class="h2 font-weight-bold mb-0"><?=$totalLogStok?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-align-left-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>