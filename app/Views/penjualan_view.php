<?= $this->extend('template') ?>

<?= $this->section('header') ?>
<div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Penjualan <?=$bulan?></h6>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Tabel Hasil Penjualan <?=$bulan?></h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="kode">Kode</th>
                            <th scope="col" class="sort" data-sort="nama">Nama</th>
                            <th scope="col" class="sort" data-sort="jumlah">Jumlah</th>
                            <th scope="col" class="sort" data-sort="tanggalTransaksi">Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php foreach($data as $item): ?>
                        <tr>
                            <td><?=$item->kode_obat?></td>
                            <td><?=$item->nama_obat?></td>
                            <td><?=$item->jumlah_terjual?></td>
                            <td><?=$item->tanggal_transaksi?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php if(!count($data)): ?>
                <p class="text-center">
                    tidak ada data untuk ditampilkan
                </p>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>