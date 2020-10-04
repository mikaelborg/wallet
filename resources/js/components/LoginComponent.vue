<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-6 offset-3">
                <form action="#" @submit.prevent="handleLogin">
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
    export default {
        data() {
            return {
                //wallets: [],
                formData: {
                    email: '',
                    password: '' 
                }
            }
        },

        methods: {
            handleLogin() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', this.formData).then(response => {
                        //this.getUserWallets();
                        //.then(() => location.href = '/wallets')
                        this.$router.push('/wallets')
                    });
                });
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
