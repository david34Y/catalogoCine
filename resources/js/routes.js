const Home = () => import ('./components/Home.vue')
const Contacto = () => import ('./components/Contacto.vue')

const Mostrar = () => import ('./components/peliculas/Mostrar.vue')
const Crear = () => import ('./components/peliculas/Crear.vue')
const Editar = () => import ('./components/peliculas/Editar.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
    },
    {
        name: 'contacto',
        path: '/contacto',
        component: Contacto,
    },
    {
        name: 'mostrarPeliculas',
        path: '/peliculas',
        component: Mostrar,
    },
    {
        name: 'crearPelicula',
        path: '/crear',
        component: Crear,
    },
    {
        name: 'editarPelicula',
        path: '/editar/:id',
        component: Editar,
    },
]
