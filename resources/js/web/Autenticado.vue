<template>
    <v-container>
      <v-card v-if="isAuthenticated">
        <v-card-title>Wlcome!</v-card-title>
        <v-card-text>Has joined to us .</v-card-text>

        <v-card-actions>
          <v-btn color="blue" variant="tonal" @click="logout">Log out</v-btn>
          <v-btn color="error" variant="tonal" @click="destroy">Delete account</v-btn>
        </v-card-actions>
      </v-card>

      <v-container class="mt-4" v-if="isAuthenticated">
        <v-card title="Customer" flat>
          <v-card-text>
            <v-list>
              <v-list-item v-for="customer in customers" :key="customer.id">
                <v-list-item-content>
                  <v-list-item-title>Datos:</v-list-item-title>
                  <v-list-item-subtitle>DNI: {{ customer.dni }}</v-list-item-subtitle>
                  <v-list-item-subtitle>Name: {{ customer.name }}</v-list-item-subtitle>
                  <v-list-item-subtitle>Last Name: {{ customer.last_name }}</v-list-item-subtitle>
                  <v-list-item-subtitle>Address: {{ customer.address }}</v-list-item-subtitle>
                  <v-list-item-subtitle>Status: {{ customer.status }}</v-list-item-subtitle>
                  <v-list-item-subtitle>Email: {{ customer.email }}</v-list-item-subtitle>
                  <v-list-item-subtitle>Commune: {{ customer.commune_description }}</v-list-item-subtitle>
                  <v-list-item-subtitle>Description: {{ customer.region_description }}</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card-text>
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
  this.dni = localStorage.getItem('dni');
 // console.log('Local Storage:', localStorage);

  if (!this.token) {
    window.location.href = '/';
  } else {
    this.isAuthenticated = true;
    this.obtenerRegions();
    this.obtenerCustomerActivos();
  }
},
destroy() {
    const token = localStorage.getItem('auth_token');
    const dni = localStorage.getItem('dni');
    console.log(dni, token);

    const url = `/api/delete/${dni}`;

    axios.delete(url, {
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => {
        Swal.fire({
            icon: 'success',
            title: 'Eliminado correctamente',
            showConfirmButton: true,
            timer: 5000
        });

        localStorage.removeItem('auth_token');
        localStorage.removeItem('dni');
        setTimeout(() => {
        window.location.href = '/';
      }, 1500);
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.response ? error.response.data.message : error.message,
            showCancelButton: true,
            timer: 1500
        });
    });
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
        //    console.log('Regions', res);
            this.regions = res.data.data;
          })
          .catch(err => {
            console.error(err);
          });
      },


      obtenerCustomerActivos() {
  const url = '/api/index-customer-table';
  const token = localStorage.getItem('auth_token');
  const dni = localStorage.getItem('dni');
  const email = localStorage.getItem('email');

  axios.get(url, {
    headers: {
      'Authorization': `Bearer ${token}`
    },
    params: {
      dni: dni
    }
  })
  .then(res => {
  //  console.log('Customers', res);
    this.customers = res.data.data;
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

}
  </script>
