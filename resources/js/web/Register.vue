<template>
    <v-card class="mx-auto"
    color="indigo-darken-3"
        variant="outlined"

    max-width="600" title="Customer Registration">
        <v-container>
            <v-text-field v-model="dni" color="primary" label="DNI" placeholder="Enter your dni"
                variant="underlined"></v-text-field>
            <v-text-field v-model="name" color="primary" label="Name" variant="underlined"></v-text-field>

            <v-text-field v-model="last_name" color="primary" label="Last name" variant="underlined"></v-text-field>

            <v-text-field v-model="email" color="primary" label="Email" variant="underlined"></v-text-field>

            <v-text-field v-model="address" color="primary" label="Address" placeholder="Enter your address"
                variant="underlined"></v-text-field>

        </v-container>

        <v-divider></v-divider>

        <v-card
        color="indigo-darken-3"
        variant="outlined"

        >
            <p class="text-black">Region</p>


            <div class="mb-3">
                <label class="block text-sm text-white"></label>
                <select
                class="block text-sm text-white-600 bg-blue"
                v-model="id_reg">
                    <option disabled selected>Choose</option>
                    <option v-for="region in regions" :key="region.id_reg" :value="region.id_reg">
                        {{ region.description }}
                    </option>
                </select>

            </div>

        </v-card>



        <v-card

        color="indigo-darken-3"
        variant="outlined">
            <p>Communes</p>


            <div class="mb-6">
                <label class="block text-sm text-gray-600"></label>
                <select
                class="block text-sm text-white-600 bg-red"
                v-model="id_com">
                    <option disabled selected>Choose</option>
                    <option v-for="region in communes" :key="region.id_com" :value="region.id_com">
                        {{ region.description }}
                    </option>
                </select>

            </div>

        </v-card>



        <v-spacer></v-spacer>

        <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn

            @click="enviarCustomer"
            variant="outlined" color="blue">
                Complete Registration

                <v-icon icon="mdi-chevron-right" end></v-icon>
            </v-btn>


        </v-card-actions>
    </v-card>
</template>


<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            dni: null,
            name: null,
            last_name: null,
            email: null,
            address: null,
            id_reg: null,
            id_com: null,
            regions: [],
            communes:[],
        }
    },

    created() {
        this.obtenerRegions();
        this.obtenerCommunes();
    },

    methods: {
        obtenerRegions() {
            const url = '/api/index-regions';

            axios.get(url)
                .then(res => {
                 //   console.log('Regions', res);
                    this.regions = res.data.data;
                })
                .catch(err => {
                    console.error(err);
                });
        },

        obtenerCommunes() {
            const url = '/api/index-communes';

            axios.get(url)
                .then(res => {
                  //  console.log('communes', res);
                    this.communes = res.data.data;
                })
                .catch(err => {
                    console.error(err);
                });
        },



        enviarCustomer() {
    const url = '/api/create_customer';
    const customer = {
        dni: this.dni,
        name: this.name,
        last_name: this.last_name,
        email: this.email,
        address: this.address,
        id_reg: this.id_reg,
        id_com: this.id_com,
        date_reg: '2024-08-31 07:02:42',
        status: 'A',

    };

    axios.post(url, customer)

        .then(function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Customer registered successfully!',
                showConfirmButton: true,
                timer: 3000


            }  );

            localStorage.setItem('auth_token', response.data.token);
            console.log( response.data.token)
            setTimeout(() => {
                    window.location.href = '/Customer';
                }, 1500);


        })
        .catch(function (error) {
            console.log(customer);
            console.log(error.message)
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.response ? error.response.data.message : error.message,
                showConfirmButton: true,
                timer: 3000
            });
        });
}

    },

    components: {},
};
</script>
