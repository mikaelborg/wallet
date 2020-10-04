<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand href="#">My Wallet</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item :to="{ name: 'wallets' }">Wallets</b-nav-item>
                    <b-nav-item :to="{ name: 'users' }">Users</b-nav-item>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <template v-if="this.$userId">
                        <b-nav-item-dropdown right>
                            <!-- Using 'button-content' slot -->
                            <template v-slot:button-content>
                                <em>User</em>
                            </template>
                            <b-dropdown-item :to="{ name: 'logout' }">Sign Out</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </template>
                    <template v-else>
                        <b-nav-item :to="{ name: 'register' }">Register</b-nav-item>
                        <b-nav-item :to="{ name: 'login' }">Login</b-nav-item>
                    </template>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log(this.$userId)
        }
    }
</script>