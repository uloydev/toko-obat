<?= $this->extend('template') ?>

<?= $this->section('header') ?>
<div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Stok Obat</h6>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Tabel Stok Obat</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="kode">Kode</th>
                            <th scope="col" class="sort" data-sort="nama">Nama</th>
                            <th scope="col" class="sort" data-sort="jumlah">Jumlah Stok</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr v-for="item in items" :key="item.id_obat">
                            <td>{{ item.kode_obat }}</td>
                            <td>{{ item.nama_obat }}</td>
                            <td>{{ item.jumlah }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <button class="dropdown-item" @click="editStok(item)">Update Stok</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Stok Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="editKode" class="form-control-label">Kode Obat</label>
                    <input class="form-control" type="text" id="editKode" v-model="kodeObatEdit" disabled>
                </div>
                <div class="form-group">
                    <label for="editNama" class="form-control-label">Nama Obat</label>
                    <input class="form-control" type="text" id="editNama" v-model="namaObatEdit" disabled>
                </div>
                <div class="form-group">
                    <label for="editBentuk" class="form-control-label">Jumlah Stok Obat</label>
                    <input class="form-control" type="text" id="editJumlah" v-model="jumlahObatEdit" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="updateStok">Save</button>
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
            modalEdit: "#editModal",
            obatIdEdit: '',
            kodeObatEdit: '',
            namaObatEdit: '',
            jumlahObatEdit: '',
        },
        created: function() {
            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
            this.getStok();
        },
        methods: {
            // toggle modal
            toggleModal: function (modalId) {
            $(modalId).modal('toggle')
            },
            // Get Product
            getStok: function () {
                axios.get('stokobat/all')
                .then(res => {
                    // handle success
                    this.items = res.data;
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },
            // Get Item Edit Product
            editStok: function(obat) {
                this.toggleModal(this.modalEdit)
                this.obatIdEdit = obat.id_obat;
                this.kodeObatEdit = obat.kode_obat;
                this.namaObatEdit = obat.nama_obat;
                this.jumlahObatEdit = obat.jumlah;
            },

            //Update Product
            updateStok: function () {
                axios.put(`stokobat/update/${this.obatIdEdit}`, {
                    kode_obat: this.kodeObatEdit,
                    nama_obat: this.namaObatEdit,
                    jumlah: this.jumlahObatEdit
                })
                .then(res => {
                    // handle success
                    this.getStok();
                    this.toggleModal(this.modalEdit)
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },
        },
    })
</script>
<?= $this->endSection() ?>