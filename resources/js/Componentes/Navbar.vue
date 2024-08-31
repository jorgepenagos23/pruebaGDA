<template>
    <div>
      <v-card>
        <v-layout>
          <v-app-bar color="green" class="app-bar">
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          </v-app-bar>
          <v-navigation-drawer v-model="drawer" class="navigation-drawer">
            <v-list>
              <v-list-item v-for="item in items" :key="item.nombre" :to="item.ruta">
                {{ item.nombre }}
              </v-list-item>
            </v-list>
          </v-navigation-drawer>
        </v-layout>
      </v-card>
    </div>
  </template>

  <style>
    .app-bar {
      z-index: 1;
    }

    .navigation-drawer {
      z-index: 100;
    }


  </style>


   <script>
    export default {
     data () {
      return {
       items: [
       { nombre: 'Inicio' , icon: 'Foo', ruta:'/' },
       { nombre: 'Customer' , icon: 'Bar', ruta:'/contacto' },
       { nombre: 'Register' , icon: 'Bar', ruta:'/register' }


       ],
       drawer: null,
      }
     },
    }
   </script>
