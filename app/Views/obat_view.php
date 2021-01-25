<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Obat List</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
    <div id="app">
    <v-app>
        <v-main>
            <v-container>
                <!-- Table List Product -->
                <template>
                    <!-- Button Add New Product -->
                    <template>
                        <v-btn color="primary" dark @click="modalAdd = true">Add New</v-btn>
                    </template>
                     
                    <v-simple-table>
                        <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">Kode</th>
                                <th class="text-left">Nama</th>
                                <th class="text-left">Bentuk</th>
                                <th class="text-left">Tanggal Produksi</th>
                                <th class="text-left">Tanggal Kadaluarsa</th>
                                <th class="text-left">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in items" :key="item.id_Obat">
                                <td>{{ item.Kode_Obat }}</td>
                                <td>{{ item.Nama_Obat }}</td>
                                <td>{{ item.Bentuk_Obat }}</td>
                                <td>{{ item.Tanggal_Produksi }}</td>
                                <td>{{ item.Tanggal_Kadaluarsa }}</td>
                                <td>{{ item.Harga }}</td>
                                <td>
                                <template>
                                    <v-icon small class="mr-2" @click="editObat(item)">
                                        mdi-pencil
                                    </v-icon>
                                    <v-icon small @click="deleteObat(item)">
                                        mdi-delete
                                    </v-icon>
                                </template>
                                </td>
                            </tr>
                        </tbody>
                        </template>
                    </v-simple-table>
 
                </template>
                <!-- End Table List Product -->
                 
                <!-- Modal Save Product -->
                <template>
                    <v-dialog v-model="modalAdd" persistent max-width="600px">
                        <v-card>
                            <v-card-title>
                                <span class="headline">Tambah Obat</span>
                            </v-card-title>
                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-text-field label="Kode Obat*" v-model="kodeObat" required>
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Nama Obat*" v-model="namaObat" required>
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Bentuk Obat*" v-model="bentukObat" required>
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Tanggal Produksi Obat*" v-model="tanggalProduksi" required>
                                            </v-text-field>
                                            <small>contoh : 2020-12-29</small>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Tanggal Kadaluarsa Obat*" v-model="tanggalKadaluarsa" required>
                                            </v-text-field>
                                            <small>contoh : 2020-12-29</small>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Harga Obat*" v-model="harga" required>
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                                <small>*harus diisi</small>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="modalAdd = false">Close</v-btn>
                                <v-btn color="blue darken-1" text @click="saveObat">Save</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </template>
                <!-- End Modal Save Product -->
 
                <!-- Modal Edit Product -->
                <template>
                    <v-dialog v-model="modalEdit" persistent max-width="600px">
                        <v-card>
                            <v-card-title>
                                <span class="headline">Edit Obat</span>
                            </v-card-title>
                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        
                                    <v-col cols="12">
                                            <v-text-field label="Kode Obat*" v-model="kodeObatEdit" required>
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Nama Obat*" v-model="namaObatEdit" required>
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Bentuk Obat*" v-model="bentukObatEdit" required>
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Tanggal Produksi Obat*" v-model="tanggalProduksiEdit" required>
                                            </v-text-field>
                                            <small>contoh : 2020-12-29</small>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Tanggal Kadaluarsa Obat*" v-model="tanggalKadaluarsaEdit" required>
                                            </v-text-field>
                                            <small>contoh : 2020-12-29</small>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Harga Obat*" v-model="hargaEdit" required>
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                                <small>*indicates required field</small>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="modalEdit = false">Close</v-btn>
                                <v-btn color="blue darken-1" text @click="updateObat">Update</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </template>
                <!-- End Modal Edit Product -->
 
                <!-- Modal Delete Product -->
                <template>
                    <v-dialog v-model="modalDelete" persistent max-width="600px">
                        <v-card>
                            <v-card-title>
                                <span class="headline"></span>
                            </v-card-title>
                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <h3>apa anda yakin ingin menghapus obat? <strong>"{{ namaObatDelete }}"</strong> ?</h3>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="modalDelete = false">No</v-btn>
                                <v-btn color="info darken-1" text @click="destroyObat">Yes
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </template>
                <!-- End Modal Delete Product -->
 
            </v-container>
        </v-main>
    </v-app>
    </div>
 
    <script src="https://vuejs.org/js/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data : {
                items: [],
                modalAdd: false,
                kodeObat: '',
                namaObat: '',
                bentukObat: '',
                tanggalProduksi: '',
                tanggalKadaluarsa: '',
                harga: '',
                modalEdit: false,
                obatIdEdit: '',
                kodeObatEdit: '',
                namaObatEdit: '',
                bentukObatEdit: '',
                tanggalProduksiEdit: '',
                tanggalKadaluarsaEdit: '',
                hargaEdit: '',
                modalDelete: false,
                obatIdDelete: '',
                namaObatDelete: '',
                hargaDelete: '',
            },
            created: function() {
                axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                this.getObat();
            },
            methods: {
                // Get Product
                getObat: function () {
                    axios.get('obat/all')
                        .then(res => {
                             // handle success
                            this.items = res.data;
                            console.log(this.items);
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                },
                // Save Product
                saveObat: function(){
                    axios.post('obat/save', {
                        Kode_Obat: this.kodeObat,
                        Nama_Obat: this.namaObat,
                        Bentuk_Obat: this.bentukObat,
                        Tanggal_Produksi: this.tanggalProduksi,
                        Tanggal_Kadaluarsa: this.tanggalKadaluarsa,
                        Harga: this.harga,
                    })
                    .then(res => {
                        // handle success
                        this.getProducts();
                        this.kodeObat = '';
                        this.namaObat = '';
                        this.bentukObat = '';
                        this.tanggalProduksi = '';
                        this.tanggalKadaluarsa = '';
                        this.harga = '';
                        this.modalAdd = false;
                    })
                    .catch(err => {
                        // handle error
                        console.log(err);
                    })
                },
 
                // Get Item Edit Product
                editObat: function(obat) {
                    this.modalEdit = true;
                    this.obatIdEdit = obat.id_Obat;
                    this.kodeObatEdit = obat.Kode_Obat;
                    this.namaObatEdit = obat.Nama_Obat;
                    this.bentukObatEdit = obat.Bentuk_Obat;
                    this.tanggalProduksiEdit = obat.Tanggal_Produksi;
                    this.tanggalKadaluarsaEdit = obat.Tanggal_Kadaluarsa;
                    this.hargaEdit = obat.Harga;
                },
 
                //Update Product
                updateObat: function () {
                    axios.put(`obat/update/${this.obatIdEdit}`, {
                            Kode_Obat: this.kodeObatEdit,
                            Nama_Obat: this.namaObatEdit,
                            Bentuk_Obat: this.bentukObatEdit,
                            Tanggal_Produksi: this.tanggalProduksiEdit,
                            Tanggal_Kadaluarsa: this.tanggalKadaluarsaEdit,
                            Harga: this.hargaEdit,
                        })
                        .then(res => {
                            // handle success
                            this.getObat();
                            this.modalEdit = false;
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                },
 
                // Get Item Delete Product
                deleteObat: function(obat){
                    this.modalDelete = true;
                    this.obatIdDelete = obat.id_Obat;
                    this.namaObatDelete = obat.Nama_Obat;
                },
 
                // Delete Product
                destroyObat: function () {
                    axios.delete(`obat/delete/${this.obatIdDelete}`)
                        .then(res => {
                            // handle success
                            this.getObat();
                            this.modalDelete = false;
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                }
 
            },
             
        })
    </script>
</body>
</html>