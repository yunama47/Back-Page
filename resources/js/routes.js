import dasbor from './components/adminDashboard.vue';
import create1 from './components/barangCreate.vue';
import create2 from './components/pengrajinCreate.vue';
import tabel1 from './components/barangTabel.vue';
import tabel2 from './components/pengrajinTabel.vue';

export const routes = [{
        name: 'dasbor',
        path: '/admin',
        component: dasbor
    },
    {
        name: 'barang',
        path: '/admin/barang',
        component: tabel1
    },
    {
        name: 'pengrajin',
        path: '/admin/pengrajin',
        component: tabel2
    },
    {
        name: 'barang.create',
        path: '/admin/barang/create',
        component: create1
    },
    {
        name: 'barang.edit',
        path: '/admin/barang/edit/:id',
        component: create1
    },
    {
        name: 'pengrajin.create',
        path: '/admin/pengrajin/create',
        component: create2
    },
    {
        name: 'pengrajin.edit',
        path: '/admin/pengrajin/edit/:id',
        component: create2
    },
];