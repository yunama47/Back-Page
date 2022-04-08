<template>
<div class="w-1/2">
        <div>
            <p class="text-xl flex items-center">
                <i class="fas fa-list mr-3"></i> {{judul}}
            </p>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full my-3 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <form @submit.prevent="saveData" class="p-10 bg-white w-full rounded shadow-xl">
                        <div class="mt-2 mr-2">
                            <label class="block text-sm text-gray-600" for="name">Nama </label>
                            <input v-model="nama_peng" class="w-full py-1 text-gray-700 bg-white rounded" type="text" required>
                            <span v-if="allerros.nama_peng" class="text-sm text-red-600">{{ allerros.nama_peng[0] }}</span>
                        </div>
                        <div class="mt-2 mr-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input v-model="email" class="w-full py-1 text-gray-700 bg-white rounded" type="text" required>
                            <span v-if="allerros.email" class="text-sm text-red-600">{{ allerros.email[0] }}</span>
                        </div>
                        <div class="mt-2 mr-2">
                            <label class=" block text-sm text-gray-600" for="message">Alamat</label>
                            <input v-model="alamat" class="w-full py-1 text-gray-700 bg-white rounded" type="text" required></input>
                            <span v-if="allerros.alamat" class="text-sm text-red-600">{{ allerros.alamat[0] }}</span>
                        </div>
                        <div class="mt-6 flex">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                            <router-link :to="{name:'pengrajin'}" class="w-20 no-underline ml-3 bg-red-600 font-semibold text-white rounded shadow-lg hover:shadow-lg flex items-center justify-center">
                                Kembali
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="flex flex-col">
            <span>{{nama_peng}}</span>
            <span>{{alamat}}</span>
            <span>{{email}}</span>
        </div> -->
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
        nama_peng:'',
        email:'',
        alamat:'',
        }
    },
    created() {
        if (this.$route.params.id) {
            this.axios
            .get('/api/peng/'+this.$route.params.id+'/edit')
            .then((response) => {
                this.judul = 'edit data '+ response.data.nama_peng;
                this.nama_peng = response.data.nama_peng;
                this.email = response.data.email;
                this.alamat = response.data.alamat;
            });
        }else{
            this.judul = 'Tambah Data';
        }
    },
    methods: {
        saveData(e) {
            e.preventDefault();
            let formData = new FormData();
            formData.append('nama_peng', this.nama_peng);
            formData.append('email', this.email);
            formData.append('alamat', this.alamat);

            if (this.$route.params.id) {
                this.axios.post('/api/peng/'+this.$route.params.id, formData,{})
                .then(response => {
                    this
                        .$swal
                        .fire(
                            {title: 'Success!', text: response.data.message, icon: 'success', timer: 1000}
                        );
                    this
                        .$router
                        .push({name:'pengrajin'});
                })
                .catch((error) => {
                    console.log(error);
                    this.allerros = error.response.data.errors;
                    this.success = false;
                })
                .finally(() => this.loading = false);
            } else {
                this.axios.post('/api/peng', formData,{})
                .then(response => {
                    this
                    .$swal
                    .fire(
                        {title: 'Success!', text: response.data.message, icon: 'success', timer: 1000}
                    );
                    this.$router.push({name:'pengrajin'}) 
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