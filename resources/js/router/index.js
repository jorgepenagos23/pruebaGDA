import { createRouter, createWebHistory } from 'vue-router';
const HomeComponent = () => import ('../web/Home.vue');
const ContactoComponent = () => import ('../web/Cotacto.vue');
const RegisterComponent = ()=>import('../web/Register.vue');
const  componentautenticado = ()=>import('../web/Autenticado.vue');

const  CustomerComponent = ()=>import('../web/Customer.vue');

const routes=[
{ path:'/', name:'home', component:HomeComponent},
{ path:'/contacto', name:'contacto', component:ContactoComponent},
{ path:'/register', name:'register', component:RegisterComponent},
{ path:'/autenticado', name:'autenticado', component:componentautenticado},
{ path:'/Customer', name:'Customer', component:CustomerComponent}


];

const router = createRouter({
 history: createWebHistory(import.meta.env.BASE_URL),
 routes
});
export default router;
