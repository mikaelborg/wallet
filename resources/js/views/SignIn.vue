<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-6 offset-3">
                <form action="#" @submit.prevent="submit">
                    <h3>Sign In</h3>
                    <div class="form-row">
                        <input type="email" name="email" class="form-control" v-model="formData.email" placeholder="Email Address">
                    </div>
                    <div class="form-row">
                        <input type="password" name="password" class="form-control" v-model="formData.password" placeholder="Password">
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'
import { mapActions } from 'vuex'

export default {
    name: 'SignIn',

    data() {
        return {
            formData: {
                email: '',
                password: ''
            }
        }
    },

    methods: {
        ...mapActions({
            signIn: 'auth/signIn'
        }),

        async submit() {
            console.log(this.formData);
            //console.log(this.signIn());
            await this.signIn(this.formData);

            this.$router.replace({ name: 'dashboard' });
            /*axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/login', this.formData).then(response => {
                    console.log(response);
                    //this.getUserWallets();
                    //.then(() => location.href = '/wallets')
                    this.$router.push('/wallets')
                });
            });*/
        },
        /*getUserWallets() {
            axios.get('/api/wallets').then(response => {
                this.wallets = response.data;
                this.$router.push('/wallets')
            });
        }*/
    }
}
</script>

<style>
.form-row {
    margin-bottom: 8px;
}
</style>
