<template>
    <v-container>
      <v-card v-if="isAuthenticated">
        <v-card-title>Welcome!</v-card-title>
        <v-card-text>Has Joined to us .</v-card-text>

        <v-card-actions>
          <v-btn color="error" @click="logout">Exit</v-btn>
        </v-card-actions>
      </v-card>

      <v-container class="mt-4" v-if="isAuthenticated">
        <v-card class="mx-auto" max-width="448">
    <v-layout>
      <v-app-bar color="info" density="prominent">
        <template v-slot:prepend>
          <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </template>

        <v-app-bar-title>My Recent Trips</v-app-bar-title>

        <template v-slot:append>
          <v-btn icon>
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>
      </v-app-bar>

      <v-main>
        <v-container fluid>
          <v-card
            class="mb-2"
            density="compact"
            prepend-avatar="https://randomuser.me/api/portraits/women/10.jpg"
            subtitle="Salsa, merengue, y cumbia"
            title="Cuba"
            variant="text"
            border
          >
            <v-img
              height="128"
              src="https://picsum.photos/512/128?image=660"
              cover
            ></v-img>

            <v-card-text>
              During my last trip to South America, I spent 2 weeks traveling
              through Patagonia in Chile.
            </v-card-text>

            <template v-slot:actions>
              <v-btn color="primary" variant="text">View More</v-btn>

              <v-btn color="primary" variant="text">See in Map</v-btn>
            </template>
          </v-card>

          <v-card
            density="comfortable"
            prepend-avatar="https://randomuser.me/api/portraits/women/17.jpg"
            subtitle="Salsa, merengue, y cumbia"
            title="Florida"
            variant="text"
            border
          >
            <v-img
              height="128"
              src="https://picsum.photos/512/128?random"
              cover
            ></v-img>

            <v-card-text>
              During my last trip to Florida, I spent 2 weeks traveling through
              the Everglades.
            </v-card-text>

            <template v-slot:actions>
              <v-btn color="primary" variant="text">View More</v-btn>

              <v-btn color="primary" variant="text">See in Map</v-btn>
            </template>
          </v-card>
        </v-container>
      </v-main>
    </v-layout>
  </v-card>



      </v-container>
    </v-container>
  </template>

  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2';

  export default {
    name: 'SuccessPage',
    data() {
      return {
        token: '',
        search: '',
        headers: [
          { text: 'Name', value: 'name' },
          { text: 'Last Name', value: 'last_name' },
          { text: 'Address', value: 'address' },
          { text: 'Status', value: 'status' },
        ],
        isAuthenticated: false,
        regions: [],
        customers: [],
      };
    },

    created() {
      this.getToken();
    },

    methods: {
        getToken() {

  this.token = localStorage.getItem('auth_token');

  if (!this.token) {
    window.location.href = '/';
  } else {
    this.isAuthenticated = true;
    this.obtenerRegions();
  }
},


      checkAuthentication() {
        const token = localStorage.getItem('auth_token');
        if (!token) {
          window.location.href = '/';
          return;
        }

        this.isAuthenticated = true;
        this.obtenerRegions();
      },

      logout() {
        localStorage.removeItem('auth_token');
        window.location.href = '/';
      },

      obtenerRegions() {
        const url = '/api/index-regions';
        axios.get(url)
          .then(res => {
            console.log('Regions', res);
            this.regions = res.data.data;
          })
          .catch(err => {
            console.error(err);
          });
      },

      obtenerCustomerActivos() {
  const url = '/api/index-customer-table';
  const token = localStorage.getItem('auth_token');
  const email = this.email;

  axios.get(url, {
    headers: {
      'Authorization': `Bearer ${token}`
    },
    params: {
      email: email
    }
  })
  .then(res => {
    console.log('Customers', res);
    this.customers = res.data.data;
    console.log(email)
  })
  .catch(err => {
    console.error('Error fetching customers:', err.response ? err.response.data : err.message);
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: err.response ? err.response.data.message : err.message,
      showConfirmButton: true,
      timer: 3000
    });
  });
}


    },
  };
  </script>
