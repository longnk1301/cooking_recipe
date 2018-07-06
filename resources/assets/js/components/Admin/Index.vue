<template>
	<div class="container-fluid admin">
		<div class="row">
			<div class="col-md-2 admin-menu">
				<ul>
				    <li>Công thức</li>
				</ul>
			</div>
			<div class="col-md-10 admin-content">
				<table class="table table-border">
					<caption>Danh sách công thức</caption>
					<thead>
						<tr>
							<th>Hình ảnh</th>
							<th>Tên công thức</th>
							<th>Thông tin</th>
							<th>Trạng thái</th>
						</tr>
					</thead>
					<tbody v-for="property in data">
						<tr>
							<td class="image">
								<img :src="config_url + property.avatar" alt="">
							</td>
							<td>{{ property.name }}</td>
							<td><button type="button" class="btn-info">Chi tiết</button></td>
                            <td class="bg-success text-center text-success" v-if="property.status == 2">
                                <span>{{ status.confirm }}</span>
                                <button class="btn-danger" @click="changeDisable(property)">Disable</button>
                                <button @click="changeNone(property)">None</button>
                                <button class="btn-warning" @click="changePending(property)">Pending</button>
                                <button class="btn-success" @click="changeShow(property)">Show</button>
                            </td>
                            <td class="bg-warning text-center text-warning" v-else-if="property.status == 1">
                                <span>{{ status.pending }}</span>
                                <button class="btn-danger" @click="changeDisable(property)">Disable</button>
                                <button @click="changeNone(property)">None</button>
                                <button class="btn-warning" @click="changePending(property)">Pending</button>
                                <button class="btn-success" @click="changeShow(property)">Show</button>
                            </td>
                            <td class="text-center text-danger bg-danger" v-else-if="property.status == 0">
                                <span>{{ status.disable }}</span>
                                <button class="btn-danger" @click="changeDisable(property)">Disable</button>
                                <button @click="changeNone(property)">None</button>
                                <button class="btn-warning" @click="changePending(property)">Pending</button>
                                <button class="btn-success" @click="changeShow(property)">Show</button>
                            </td>
                            <td class="text-center text-primary" v-else="">
                                <span>{{ status.none }}</span>
                                <button class="btn-danger" @click="changeDisable(property)">Disable</button>
                                <button @click="changeNone(property)">None</button>
                                <button class="btn-warning" @click="changePending(property)">Pending</button>
                                <button class="btn-success" @click="changeShow(property)">Show</button>
                            </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				text: '',
				status: {
                    pending: 'Pending',
                    confirm: 'Confirm',
                    disable: 'Disable',
                    none: 'None',
                },
				data: [],
				config_url: 'http://cookingrecipe.herokuapp.com/'
			}
		},
		created() {
			this.getAllRecipe()
		},
		methods: {
			getAllRecipe() {
				axios.get('/admin-info')
				.then(response => {
                   this.data = response.data
               })
               .catch(error => {
                   console.log(error)
               })
			},
			changeNone(myRecipe) {
                this.data.forEach(function(element) {
                    if (element.id == myRecipe.id) {
                        element.status = 4
                    }
                });
                axios.put('/change-none/' + myRecipe.id, {
                })
                .then(response => {
                    alert(response.data.result)
                })
            },
            changeShow(myRecipe) {
                this.data.forEach(function(element) {
                    if (element.id == myRecipe.id) {
                        element.status = 2
                    }
                });
                axios.put('/change-show/' + myRecipe.id, {
                })
                .then(response => {
                    alert(response.data.result)
                })
            },
            changePending(myRecipe) {
                this.data.forEach(function(element) {
                    if (element.id == myRecipe.id) {
                        element.status = 1
                    }
                });
                axios.put('/change-pending/' + myRecipe.id, {
                })
                .then(response => {
                    alert(response.data.result)
                })
            },
            changeDisable(myRecipe) {
                this.data.forEach(function(element) {
                    if (element.id == myRecipe.id) {
                        element.status = 0
                    }
                });
                axios.put('/change-disable/' + myRecipe.id, {
                })
                .then(response => {
                    alert(response.data.result)
                })
            },
		}
	}
</script>

<style lang="scss" scoped>
	
</style>