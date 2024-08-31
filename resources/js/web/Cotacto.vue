<template>
    <v-sheet class="bg-indigo-darken-3 pa-12" rounded>
      <v-card class="mx-auto px-6 py-8" max-width="600">
        <v-img
      class="align-end text-white"
      height="200"
      src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
      cover
    >
      <v-card-title>TRY DNI FIRST</v-card-title>
    </v-img>
        <v-form @submit.prevent="handleSubmit">
          <v-text-field v-model="email" :rules="[required]" class="mb-2" variant="outlined"
            label="Email" clearable v-if="authMethod === 'email'"></v-text-field>

          <v-text-field v-model="dni" :rules="[required]" class="mb-2" variant="outlined"
            label="DNI" clearable v-if="authMethod === 'dni'"></v-text-field>

          <v-btn @click="setAuthMethod('dni')" color="primary" class="mr-2">Search by DNI</v-btn>
          <v-btn @click="setAuthMethod('email')" color="secondary">Search by email</v-btn>

          <br />
          <br>
          <v-spacer></v-spacer>
          <v-btn color="success" size="large" type="submit" variant="elevated" block>
            Access
          </v-btn>
        </v-form>
      </v-card>
    </v-sheet>
  </template>


  <script>
  import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      authMethod: null,
      email: null,
      dni: null,
      loading: false,
    };
  },

  methods: {
    setAuthMethod(method) {
      this.authMethod = method;
    },

    handleSubmit() {
      if (this.authMethod === 'email') {
        this.authenticateByEmail();
      } else if (this.authMethod === 'dni') {
        this.authenticateByDNI();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Please select an authentication method.',
          showConfirmButton: true,
          timer: 3000
        });
      }
    },

    authenticateByEmail() {

  const url = 'api/authenticate';
  const send = { email: this.email };

  axios.post(url, send)
    .then(response => {
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Customer access successfully!',
        showConfirmButton: true,
        timer: 3000
      });

      const token = response.data.token.token;
      localStorage.setItem('auth_token', token);
      //console.log('Stored token:', token);

      setTimeout(() => {
        window.location.href = '/autenticado';
      }, 1500);
    })
    .catch(error => {
      console.error(error.message);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: error.response ? error.response.data.message : error.message,
        showConfirmButton: true,
        timer: 3000
      });
    });
},

    authenticateByDNI() {
      const url = '/api/authenticate/dni';
      const send = { dni: this.dni };

      axios.post(url, send)
        .then(response => {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Customer access successfully!',
            showConfirmButton: true,
            timer: 3000
          });


          const email = response.data.email;
            localStorage.setItem('email',email);
          //  console.log('Stored email:', email);


            const dni = response.data.dni;
            localStorage.setItem('dni',dni);
           // console.log('Stored token:', dni);

             const token = response.data.token.token;
            localStorage.setItem('auth_token', token);
         //   console.log('Stored token:', token);

          setTimeout(() => {
            window.location.href = '/autenticado';
          }, 1500);
        })
        .catch(error => {
          console.error(error.message);
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.response ? error.response.data.message : error.message,
            showConfirmButton: true,
            timer: 3000
          });
        });
    }
  }
};

  </script>
