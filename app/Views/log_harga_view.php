<?= $this->extend('template') ?>

<?= $this->section('header') ?>
<div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Log Harga</h6>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Tabel Log Harga Obat</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="kode">Kode</th>
                            <th scope="col" class="sort" data-sort="nama">Nama</th>
                            <th scope="col" class="sort" data-sort="hargaLama">Harga Lama</th>
                            <th scope="col" class="sort" data-sort="hargaBaru">Harga Baru</th>
                            <th scope="col" class="sort" data-sort="perubahan">Wahtu Perubahan</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr v-for="item in items" :key="item.id_obat">
                            <td>{{ item.kode_obat }}</td>
                            <td>{{ item.nama_obat }}</td>
                            <td>{{ item.harga_lama }}</td>
                            <td>{{ item.harga_baru }}</td>
                            <td>{{ item.waktu_perubahan }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <button class="dropdown-item" @click="deleteLog(item)">Hapus Log</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p v-if="!items.length" class="text-center">
                    tidak ada data untuk ditampilkan
                </p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Log Harga Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h3>Apa Anda Yakin ingin menghapus log ini ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="destroyLog">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    new Vue({
        el: '#app',
        data : {
            items: [],
            modalDelete: "#deleteModal",
            logId: '',
        },
        created: function() {
            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
            this.getLog();
        },
        methods: {
            // toggle modal
            toggleModal: function (modalId) {
            $(modalId).modal('toggle')
            },
            // Get Product
            getLog: function () {
                axios.get('/log/allharga')
                .then(res => {
                    // handle success
                    this.items = res.data;
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },
            // Get Item Delete Product
            deleteLog: function(log){
                this.toggleModal(this.modalDelete);
                this.logId = log.log_id;
            },

            // Delete Product
            destroyLog: function () {
                axios.delete(`/log/deleteharga/${this.logId}`)
                .then(res => {
                    // handle success
                    this.getLog();
                    this.toggleModal(this.modalDelete);
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            }
        },
    })
</script>
<?= $this->endSection() ?>