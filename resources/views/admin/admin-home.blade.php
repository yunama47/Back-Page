<x-admin-layout>
    <div class="w-full ">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-compass mr-3"></i> {{$title}}
        </p>
    </div>
    <div class="w-full flex flex-row ">
        <div class="flex flex-col mr-2">
            <div class="p-3 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
                <div class="shrink-0">
                    <i class="fas fa-palette"></i>
                </div>
                <div>
                    <div class="text-xl font-medium text-black">Jumlah Barang Saat ini</div>
                    <p class="text-gray-500">{{$jB}}</p>
                </div>
            </div>
            <a href="{{route('brg.create')}}">
                <button class="w-full bg-green-600 text-white font-semibold py-2 mr-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Data Barang
                </button>
            </a>
        </div>
        <div class="flex flex-col">
            <div class="p-3 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
                <div class="shrink-0">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="text-xl font-medium text-black">Jumlah Pengrajin Saat ini</div>
                    <p class="text-gray-500">{{$jP}}</p>
                </div>
            </div>
            <a href="{{route('peng.create')}}">
                <button class="w-full bg-green-600 text-white font-semibold py-2 ml-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Data Pengrajin
                </button>
            </a>
        </div>
    </div>
</x-admin-layout>