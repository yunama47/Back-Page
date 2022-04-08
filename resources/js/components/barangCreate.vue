<template>
<div class="w-full ">
        <div>
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> {{judul}}
            </p>
        </div>
        <form enctype='multipart/form-data'  @submit.prevent="saveData">
            <div class="w-full my-3 pr-0 lg:pr-2">
                <div class="flex flex-row p-2 bg-white rounded shadow-xl">
                    <div class=" w-1/2 flex flex-col">
                        <!-- nama barang -->
                        <div class=" w-auto mt-2 mr-2">
                            <label class=" text-sm text-gray-600" for="name">Nama Kerajinan</label>
                            <input class="placeholder:italic placeholder:text-gray-400 w-full py-1 text-gray-700 bg-white rounded" v-model="nama_barang" type="text" required placeholder="contoh : Patung-Arjuna">
                            <span v-if="allerros.nama_kerajinan" class="text-sm text-red-600">{{ allerros.nama_kerajinan[0] }}</span>

                        </div>
                        <div class=" w-auto mt-2 mr-2">
                            <label class=" text-sm text-gray-600" for="email">Harga</label>
                            <input class="placeholder:italic placeholder:text-gray-400 w-full py-1 text-gray-700 bg-white rounded" v-model="harga" type="text" required placeholder="max: 999999">
                            <span v-if="allerros.harga" class="text-sm text-red-600">{{ allerros.harga[0] }}</span>
                        </div>
                        <div class=" w-auto mt-2 mr-2">
                            <!-- nama pengrajin -->
                            <label class=" text-sm text-gray-600" for="email">Nama Pengrajin</label>
                            <select class="w-full py-1 text-gray-700 bg-white rounded" v-model="id_peng">
                                <option value="">Pilih Pengrajin</option>
                                <option v-for='p in pengrajins':value='p.id_peng'>
                                    {{p.nama_peng}}
                                </option>
                            </select>
                        </div>
                        <div class="w-auto mt-2">
                            <label class="block text-sm text-gray-600" for="message">Deskripsi</label>
                            <ckeditor class="placeholder:italic placeholder:text-gray-400" v-model='keterangan':config='editorConfig' placeholder="kerajinan ini adalah..."></ckeditor>
                        </div>
                    </div>
                    <!-- bagian kanan -->
                    <div class="ml-2 w-1/2 flex flex-col">
                        <div class=" w-auto mt-2 mr-2">
                            <label class=" text-sm text-gray-600" for="email">Bahan Utama</label>
                            <input class="w-full py-1 text-gray-700 bg-white rounded" v-model="bahan" type="text" required placeholder="contoh : Kayu">
                            <!-- <select class="w-full py-1 text-gray-700 bg-white rounded" id="bahan" name="bahan">
                                <option value="">Pilih Bahan</option>
                                <option value="Aluminium" {{ (isset($barang)&&$barang->bahan=="Aluminium")?'selected':''}}>Aluminium</option>
                                <option value="Perak" {{ (isset($barang)&&$barang->bahan=="Perak")?'selected':''}}>Perak</option>
                                <option value="Kayu" {{ (isset($barang)&&$barang->bahan=="Kayu")?'selected':''}}>Kayu</option>
                                <option value="Keramik" {{ (isset($barang)&&$barang->bahan=="Keramik")?'selected':''}}>Keramik</option>
                            </select> -->
                            <span v-if="allerros.bahan" class="text-sm text-red-600">{{ allerros.bahan[0] }}</span>
                        </div>
                        <div class=" w-auto mt-2">
                            <!--gambar-->
                            <label class=" text-sm text-gray-600" for="email">Gambar Kerajinan</label>
                            <input class="w-full py-1 text-gray-700 bg-white rounded"  v-on:change="onFileChange" type="file">
                            <span v-if="allerros.gambar" class="text-sm text-red-600">{{ allerros.gambar[0] }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex">
                    <button class=" px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded shadow-lg hover:shadow-lg" type="submit">Submit</button>
                    <router-link :to="{name:'barang'}" class="no-underline w-20 ml-3 bg-red-600 font-semibold text-white rounded shadow-lg hover:shadow-lg flex items-center justify-center">
                        Cancel
                    </router-link>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data() {
    return {
        judul:'',
        errors: [],
        allerros: [],
        success: false,
        message: '',
        pengrajins:{},
        nama_barang:'',
        bahan:'',
        harga:'',
        keterangan:'',
        id_peng:'',
        gambar:'',
        editorConfig: {
            toolbar: [
                [ 'Bold', 'Italic']
            ]}
        }
    },
    created() {
        this
        .axios
        .get('/api/barang')
        .then(response => {
            this.pengrajins = response.data.pengrajin;
        });

        if (this.$route.params.id) {
            this.axios
            .get('/api/barang/'+this.$route.params.id+'/edit')
            .then((response) => {
                this.judul = 'Edit data '+response.data.barang.nama_kerajinan;
                this.nama_barang = response.data.barang.nama_kerajinan;
                this.bahan = response.data.barang.bahan;
                this.harga = response.data.barang.harga;
                this.keterangan = response.data.barang.keterangan;
                this.id_peng = response.data.barang.id_peng;
                this.gambar = response.data.barang.gambar;
            });
        }else{
            this.judul = 'Tambah data';
        }
    },
    methods: {
        onFileChange(e) {
            //if(this.gambar!=''){
                this.gambar = e
                .target
                .files[0];
            // }else{
            // }
        },
        saveData(e) {
            e.preventDefault();
            let formData = new FormData();
            formData.append('nama_kerajinan', this.nama_barang);
            formData.append('bahan', this.bahan);
            formData.append('harga', this.harga);
            formData.append('keterangan', this.keterangan);
            formData.append('id_peng', this.id_peng);
            formData.append('gambar', this.gambar);

            if (this.$route.params.id) {
                this.axios.post('/api/barang/'+this.$route.params.id, formData,{
                    headers: {
                        'content-type': 'multipart/form-data'
                    }})
                .then(response => {
                    this
                        .$swal
                        .fire(
                            {title: 'Success!', text: response.data.message, icon: 'success', timer: 1000}
                        );
                    this
                        .$router
                        .push({name:'barang'});
                })
                .catch((error) => {
                    console.log(error);
                    this.allerros = error.response.data.errors;
                    this.success = false;
                })
                .finally(() => this.loading = false);
            } else {
                this.axios.post('/api/barang', formData,{
                    headers: {
                        'content-type': 'multipart/form-data'
                    }})
                .then(response => {
                    this
                    .$swal
                    .fire(
                        {title: 'Success!', text: response.data.message, icon: 'success', timer: 1000}
                    );
                    this.$router.push({name:'barang'}) 
                })
                .catch((error) => {
                    console.log(error);
                    this.allerros = error.response.data.errors;
                    this.success = false;
                })
                .finally(() => this.loading = false);
            }
        }
    }
}
</script>