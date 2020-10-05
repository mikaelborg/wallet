<template>
    <div>
		<div class="row mt-4" v-if="wallets !== undefined">
			<h3>Wallets</h3>
			<b-button @click="info('Add', null, $event.target)" class="btn btn-success">Add</b-button>
			<b-table hover :items="wallets" :fields="fields">
				<template v-slot:cell(actions)="row">
					<b-button @click="info('Edit', row.item.id, $event.target)" class="btn btn-info">Edit</b-button>
					<b-button class="btn btn-danger" @click="deleteWallet(row.item.id)">Delete</b-button>
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
				wallets: [],
				fields: [
					{ key: 'id'},
					{ key: 'name' },
					{ key: 'balance' },
					{ key: 'currency' },
					{ key: 'status' },
					{ key: 'actions' }
				],
				infoModal: {
					id: 'edit-modal',
					title: ''
				},
				formData: {
					id: '',
                    name: '',
					currency: 'EUR',
					status: 'ACTIVE'
                }
			}
		},
		methods: {
			resetFormData() {
				this.formData.id = '';
				this.formData.name = '';
				this.formData.currency = 'EUR';
				this.formData.status = 'ACTIVE';
			},
			info(type, item, button) {
				this.infoModal.title = `${type} wallet`;
				if (item) {
					axios.get(`/api/wallets/${item}`).then(response => {
						this.formData = response.data.data;
						console.log(this.formData);
						this.$root.$emit('bv::show::modal', this.infoModal.id, button);
					});
				} else {
					this.resetFormData();
					this.$root.$emit('bv::show::modal', this.infoModal.id, button);
				}
			},
            logout() {
				console.log("logouting");
                axios.post('/logout');
			},
			handleOk() {
				if (this.formData.id) {
					axios.put(`/api/wallets/${this.formData.id}`, this.formData).then(response => {
						this.updateWallets();
					});
				} else {
					axios.post('/api/wallets', this.formData).then(response => {
						this.updateWallets();
					});
				}
			},
			deleteWallet(id) {
				axios.delete(`/api/wallets/${id}`, this.formData).then(response => {
					this.updateWallets();
				});
			},
			updateWallets() {
				axios.get('/api/wallets').then(response => {
					this.wallets = response.data.data;
				});
			}
        },
        mounted() {
			this.updateWallets();
        }
	}
</script>
