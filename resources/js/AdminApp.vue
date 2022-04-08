<template>
    <div class="w-full flex h-screen overflow-y-hidden">
    <!-- sidebar -->
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <!-- active-nav-link -->
        <nav class="text-white text-base font-semibold pt-3">
            <router-link to="/admin" class="flex no-underline items-center opacity-75 hover:opacity-100 text-white py-4 pl-6 nav-item ">
                <i class="fas fa-home mr-3"></i>Home
            </router-link>
            <router-link to="/admin/barang" class="flex no-underline items-center opacity-75 hover:opacity-100 text-white py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>Tabel Barang
            </router-link>
            <router-link to="/admin/pengrajin" class="flex no-underline items-center opacity-75 hover:opacity-100 text-white py-4 pl-6 nav-item ">
                <i class="fas fa-table mr-3"></i>Tabel Pengrajin
            </router-link>
        </nav>
    </aside>
<!-- main -->
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <router-view> </router-view>
        </main>
    </div>
</div>
</template>