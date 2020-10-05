<template>
    <div>
        <div class="row mt-4" v-if="users !== undefined">
            <h3>Users</h3>
            <b-table hover :items="users">
                <template v-slot:cell(wallets)="row">
                    <ul v-for="wallet in row.value" :key="wallet.id">
                        {{ wallet.name }} : {{ (wallet.balance) }}
                        <b-button @click="editBalance(wallet, $event.target)" class="btn btn-info">Edit</b-button>
                    </ul>
                </template>
            </b-table>
            <b-modal :id="infoModal.id" :title="infoModal.title" @ok="handleOk">
                <div class="form-group">
                    <label>Enter name</label>
                    <input type="text" class="form-control" v-model="formData.name" />
                </div>
                <div class="form-group">
                    <label>Enter currency</label>
                    <input type="text" class="form-control" v-model="formData.currency" />
                </div>
                <div class="form-group">
                    <label>Enter balance</label>
                    <input type="text" class="form-control" v-model="formData.balance" />
                </div>
                <div class="form-group">
                    <label>Select status</label>
                    <select v-model="formData.status">
                        <option>ACTIVE</option>
                        <option>INACTIVE</option>
                    </select>
                </div>
            </b-modal>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                users: [],
                infoModal: {
                    id: 'edit-modal',
                    title: 'Edit wallet'
                },
                formData: {
                    id: '',
                    name: '',
                    balance: '',
                    currency: 'EUR',
                    status: 'ACTIVE'
                }
            }
        },
        methods: {
            updateUsers() {
                axios.get('/api/users').then(response => {
                    this.users = response.data.data;
                });
            },
            editBalance(wallet, button) {
                axios.get(`/api/wallets/${wallet.id}`).then(response => {
                    this.formData = response.data.data;
                    console.log(this.formData);
                    this.$root.$emit('bv::show::modal', this.infoModal.id, button);
                });
            },
            handleOk() {
                axios.put(`/api/wallets/${this.formData.id}`, this.formData).then(response => {
                    this.updateUsers();
                });
            },
        },
        mounted() {
            this.updateUsers();
        }
    }
</script>
