<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="success">
            <b-navbar-brand href="#">My Wallet</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <template v-if="authenticated">
                        <template v-if="user.data.super === 1">
                            <b-nav-item :to="{ name: 'users' }">Users</b-nav-item>
                        </template>
                        <b-nav-item :to="{ name: 'wallets' }">Wallets</b-nav-item>
                    </template>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <template v-if="authenticated">
                        <b-nav-item-dropdown right>
                            <!-- Using 'button-content' slot -->
                            <template v-slot:button-content>
                                <em>{{ user.data.name }}</em>
                            </template>
                            <b-dropdown-item href="#" @click.prevent="signOut">Sign Out</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </template>
                    <template v-else>
                        <b-nav-item :to="{ name: 'register' }">Register</b-nav-item>
                        <b-nav-item :to="{ name: 'signin' }">Sign In</b-nav-item>
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
    import { mapGetters, mapActions } from 'vuex'
    export default {
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },

        methods: {
            ...mapActions({
                signOutAction: 'auth/signOut'
            }),

            async signOut () {
                await this.signOutAction()

                this.$router.replace({ name: 'dashboard' })
            }
        }
    }
</script>
