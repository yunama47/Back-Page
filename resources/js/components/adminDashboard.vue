<template>
<div class="w-full ">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-compass mr-3"></i> Selamat Datang di Halaman Admin
        </p>
    <div class="w-full flex flex-row ">
        <div class="flex flex-col mr-2">
            <div class="px-2 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
                <div class="shrink-0">
                    <i class="fas fa-palette"></i>
                </div>
                <div>
                    <div class="font-medium text-black">Jumlah Barang Saat ini</div>
                    <p class="text-gray-500 text-xl" v-model="jumlah">{{jumlah.jBrg}}</p>
                </div>
            </div>
            <router-link :to="{name:'barang.create'}" class="flex no-underline items-center py-4">
               <button class="w-full bg-green-600 text-white font-semibold py-2 mr-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Data Barang
                </button>
            </router-link>
        </div>
        <div class="flex flex-col">
            <div class="px-2 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
                <div class="shrink-0">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class=" font-medium text-black">Jumlah Pengrajin Saat ini</div>
                    <p class="text-gray-500 text-xl" v-model="jumlah" >{{jumlah.jPeng}}</p>
                </div>
            </div>
            <router-link :to="{name:'pengrajin.create'}" class="flex no-underline items-center py-4">
               <button class="w-full bg-green-600 text-white font-semibold py-2 ml-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Data Pengrajin
                </button>
            </router-link>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data() {
        return {
            jumlah:{},
        }
    },
    created() {
        this
        .axios
        .get('/api/dasbor')
        .then(response => {
                this.jumlah = response.data;
        });
    },
}
</script>