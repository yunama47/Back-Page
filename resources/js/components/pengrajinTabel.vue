<template>
<div class="w-full ">
        <p class="text-xl flex items-center">
            <i class="fas fa-list mr-3"></i> Daftar Pengrajin
        </p>
        <div class=" w-full my-3 items-center">
            <router-link :to="{name:'pengrajin.create'}">
                <button class="w-40 h-10 float-left bg-green-600 text-white font-semibold  rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black items-center ">
                    <i class="fas fa-plus mr-3"></i> Tambah Data
                </button>
            </router-link>
            <div class="flex flex-row justify-end w-auto">
                <label class="relative block">
                    <span class="sr-only">Search</span>
                    <input @keyup="searchData" v-model="s" placeholder="Cari Pengrajin..." type="text" name="search" class="placeholder:italic placeholder:text-gray-400 block bg-white w-full border border-gray-300 rounded-md-2x1 py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"/>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <i class="fas fa-search"></i>
                    </span>
                </label>
            </div>
        </div>    
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        <th class="w-1/6 text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 ">
                    <tr v-for="(item, index) in pengrajins.data" :key="index">
                        <td class=" text-left py-3 px-4">{{item.nama_peng}}</td>
                        <td class=" text-left py-3 px-4">{{item.alamat}}</td>
                        <td class=" text-left py-3 px-4">{{item.email}}</td>
                        <td class=" px-4 py-3 text-center">
                            <!-- <form action="" method="POST"> -->
                                <div class="flex">
                                    <router-link :to="{name:'pengrajin.edit',params: { id: item.id_peng }}" class="w-1/2 no-underline bg-blue-600 text-white font-semibold p-1 m-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-100 hover:text-black flex items-center justify-center">
                                    Edit
                                    </router-link>
                                    <button @click="deleteData(item.id_peng)" class="w-1/2 bg-red-600 text-white font-semibold p-1 m-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-100 hover:text-black flex items-center justify-center">
                                    Del</button>
                                </div>
                            <!-- </form> -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <pagination :data="pengrajins" @pagination-change-page="table" class="flex flex-row justify-center space-x-2"></pagination>
</div>
</template>
<script>
export default {
    data() {
        return {
            pengrajins:{},
            s:'',
        }
    },
    mounted() {
        this.table();
    },
    methods: {
        table(page=1){
                this
                .axios
                .get('/api/peng?page='+page+'&s='+this.s)
                .then(response => {
                this.pengrajins = response.data;
            });
        },
        searchData(e){
            this.table();
        },
        deleteData(id) {
            this
            .$swal
            .fire({
                title: 'Apakah kamu yakin?',
                text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Batal'
            })
            .then((result) => {
                if (result.value) {
                let uri = `/api/peng/${id}`;
                this
                    .axios
                    .delete(uri)
                    .then(response => {
                        this
                        .$swal
                        .fire(
                            {title: 'Success!', text: 'Data Berhasil Dihapus', icon: 'success', timer: 1000}
                        );
                        this
                        .pengrajins.data
                        .splice(this.pengrajins.data.indexOf(id), 1);
                        this.table();
                    });
                }})
        }
    },
}
</script>