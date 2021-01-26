<?= $this->extend('template') ?>

<?= $this->section('header') ?>
<div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Data Obat</h6>
</div>
<div class="col-lg-6 col-5 text-right">
    <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#addModal">Tambah Obat</a>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Tabel Data Obat</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="kode">Kode</th>
                            <th scope="col" class="sort" data-sort="nama">Nama</th>
                            <th scope="col" class="sort" data-sort="bentuk">Bentuk</th>
                            <th scope="col" class="sort" data-sort="tanggalProduksi">Tanggal Produksi</th>
                            <th scope="col" class="sort" data-sort="tanggalKadaluarsa">Tanggal Kadaluarsa</th>
                            <th scope="col" class="sort" data-sort="harga">Harga</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr v-for="item in items" :key="item.id_obat">
                            <td>{{ item.kode_obat }}</td>
                            <td>{{ item.nama_obat }}</td>
                            <td>{{ item.bentuk_obat }}</td>
                            <td>{{ item.tanggal_produksi }}</td>
                            <td>{{ item.tanggal_kadaluarsa }}</td>
                            <td>{{ item.harga }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <button class="dropdown-item" @click="editObat(item)">Edit</button>
                                        <button class="dropdown-item" @click="deleteObat(item)">Delete</button>
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
<!-- modal add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="tambahObat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="addKode" class="form-control-label">Kode Obat</label>
                    <input class="form-control" type="text" id="addKode" v-model="kodeObat" required>
                </div>
                <div class="form-group">
                    <label for="addNama" class="form-control-label">Nama Obat</label>
                    <input class="form-control" type="text" id="addNama" v-model="namaObat" required>
                </div>
                <div class="form-group">
                    <label for="addBentuk" class="form-control-label">Bentuk Obat</label>
                    <input class="form-control" type="text" id="addBentuk" v-model="bentukObat" required>
                </div>
                <div class="form-group">
                    <label for="addTanggalProduksi" class="form-control-label">Tanggal Produksi</label>
                    <input class="form-control" type="text" id="addTanggalProduksi" v-model="tanggalProduksi" required>
                    <small>contoh : 2020-12-29</small>
                </div>
                <div class="form-group">
                    <label for="addTanggalKadaluarsa" class="form-control-label">Tanggal Kadaluarsa</label>
                    <input class="form-control" type="text" id="addTanggalKadaluarsa" v-model="tanggalKadaluarsa" required>
                    <small>contoh : 2020-12-29</small>
                </div>
                <div class="form-group">
                    <label for="addHarga" class="form-control-label">Harga</label>
                    <input class="form-control" type="text" id="addHarga" v-model="harga" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="saveObat">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- modal edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="editKode" class="form-control-label">Kode Obat</label>
                    <input class="form-control" type="text" id="editKode" v-model="kodeObatEdit" required>
                </div>
                <div class="form-group">
                    <label for="editNama" class="form-control-label">Nama Obat</label>
                    <input class="form-control" type="text" id="editNama" v-model="namaObatEdit" required>
                </div>
                <div class="form-group">
                    <label for="editBentuk" class="form-control-label">Bentuk Obat</label>
                    <input class="form-control" type="text" id="editBentuk" v-model="bentukObatEdit" required>
                </div>
                <div class="form-group">
                    <label for="editTanggalProduksi" class="form-control-label">Tanggal Produksi</label>
                    <input class="form-control" type="text" id="editTanggalProduksi" v-model="tanggalProduksiEdit" required>
                    <small>contoh : 2020-12-29</small>
                </div>
                <div class="form-group">
                    <label for="editTanggalKadaluarsa" class="form-control-label">Tanggal Kadaluarsa</label>
                    <input class="form-control" type="text" id="editTanggalKadaluarsa" v-model="tanggalKadaluarsaEdit" required>
                    <small>contoh : 2020-12-29</small>
                </div>
                <div class="form-group">
                    <label for="editHarga" class="form-control-label">Harga</label>
                    <input class="form-control" type="text" id="editHarga" v-model="hargaEdit" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="updateObat">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="editKode" class="form-control-label">Kode Obat</label>
                    <input class="form-control" type="text" id="editKode" v-model="kodeObatEdit" required>
                </div>
                <div class="form-group">
                    <label for="editNama" class="form-control-label">Nama Obat</label>
                    <input class="form-control" type="text" id="editNama" v-model="namaObatEdit" required>
                </div>
                <div class="form-group">
                    <label for="editBentuk" class="form-control-label">Bentuk Obat</label>
                    <input class="form-control" type="text" id="editBentuk" v-model="bentukObatEdit" required>
                </div>
                <div class="form-group">
                    <label for="editTanggalProduksi" class="form-control-label">Tanggal Produksi</label>
                    <input class="form-control" type="text" id="editTanggalProduksi" v-model="tanggalProduksiEdit" required>
                    <small>contoh : 2020-12-29</small>
                </div>
                <div class="form-group">
                    <label for="editTanggalKadaluarsa" class="form-control-label">Tanggal Kadaluarsa</label>
                    <input class="form-control" type="text" id="editTanggalKadaluarsa" v-model="tanggalKadaluarsaEdit" required>
                    <small>contoh : 2020-12-29</small>
                </div>
                <div class="form-group">
                    <label for="editHarga" class="form-control-label">Harga</label>
                    <input class="form-control" type="text" id="editHarga" v-model="hargaEdit" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="updateObat">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="tambahObat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Apa Anda Yakin ingin menghapus obat "{{ namaObatDelete }}"</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" @click="destroyObat">Hapus</button>
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
            modalAdd: "#addModal",
            kodeObat: '',
            namaObat: '',
            bentukObat: '',
            tanggalProduksi: '',
            tanggalKadaluarsa: '',
            harga: '',
            modalEdit: "#editModal",
            obatIdEdit: '',
            kodeObatEdit: '',
            namaObatEdit: '',
            bentukObatEdit: '',
            tanggalProduksiEdit: '',
            tanggalKadaluarsaEdit: '',
            hargaEdit: '',
            modalDelete: "#deleteModal",
            obatIdDelete: '',
            namaObatDelete: '',
        },
        created: function() {
            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
            this.getObat();
        },
        methods: {
            // toggle modal
            toggleModal: function (modalId) {
            $(modalId).modal('toggle')
            },
            // Get Product
            getObat: function () {
                axios.get('obat/all')
                .then(res => {
                    // handle success
                    this.items = res.data;
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },
            // Save Product
            saveObat: function(){
                axios.post('obat/save', {
                    kode_obat: this.kodeObat,
                    nama_obat: this.namaObat,
                    bentuk_obat: this.bentukObat,
                    tanggal_produksi: this.tanggalProduksi,
                    tanggal_kadaluarsa: this.tanggalKadaluarsa,
                    harga: this.harga,
                })
                .then(res => {
                    // handle success
                    this.getObat();
                    this.kodeObat = '';
                    this.namaObat = '';
                    this.bentukObat = '';
                    this.tanggalProduksi = '';
                    this.tanggalKadaluarsa = '';
                    this.harga = '';
                    this.toggleModal(this.modalAdd)
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            // Get Item Edit Product
            editObat: function(obat) {
                this.toggleModal(this.modalEdit)
                this.obatIdEdit = obat.id_obat;
                this.kodeObatEdit = obat.kode_obat;
                this.namaObatEdit = obat.nama_obat;
                this.bentukObatEdit = obat.bentuk_obat;
                this.tanggalProduksiEdit = obat.tanggal_produksi;
                this.tanggalKadaluarsaEdit = obat.tanggal_kadaluarsa;
                this.hargaEdit = obat.harga;
            },

            //Update Product
            updateObat: function () {
                axios.put(`obat/update/${this.obatIdEdit}`, {
                    kode_obat: this.kodeObatEdit,
                    nama_obat: this.namaObatEdit,
                    bentuk_obat: this.bentukObatEdit,
                    tanggal_produksi: this.tanggalProduksiEdit,
                    tanggal_kadaluarsa: this.tanggalKadaluarsaEdit,
                    harga: this.hargaEdit,
                })
                .then(res => {
                    // handle success
                    this.getObat();
                    this.toggleModal(this.modalEdit)
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },
            // Get Item Delete Product
            deleteObat: function(obat){
                this.toggleModal(this.modalDelete);
                this.obatIdDelete = obat.id_obat;
                this.namaObatDelete = obat.nama_obat;
            },

            // Delete Product
            destroyObat: function () {
                axios.delete(`obat/delete/${this.obatIdDelete}`)
                .then(res => {
                    // handle success
                    this.getObat();
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