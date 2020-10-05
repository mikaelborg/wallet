<template>
  <div class="container">
        <div class="row mt-4">
            <div class="col-6 offset-3">
                <form action="#" @submit.prevent="register">
                    <h3>Register</h3>
                    <div class="form-row">
                        <input type="name" name="name" class="form-control" v-model="formData.name" placeholder="Name">
                    </div>
                    <div class="form-row">
                        <input type="email" name="email" class="form-control" v-model="formData.email" placeholder="Email Address">
                    </div>
                    <div class="form-row">
                        <input type="password" name="password" class="form-control" v-model="formData.password" placeholder="Password">
                    </div>
                    <input type="checkbox" id="super" v-model="formData.super">
                    <label for="super">Super user?</label>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
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
                formData: {
                    name: '',
                    email: '',
                    password: '',
                    super: false
                }
            }
        },

        methods: {
            register() {
                axios.post('/api/register', this.formData).then(response => {
                    console.log(response);
                });
            }
        }
    }
</script>

<style>
    .form-row {
        margin-bottom: 8px;
    }
</style>




