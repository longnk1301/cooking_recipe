<template>
<div class="member-recipe container-fluid">
    <div class="row">
        <div class="col-md-3 user">
            <div class="user-inner">
                <div class="row avatar" >
                    <img :src="config_path + data[0].avatar" alt="">
                </div>
                <div class="row user-info">
                    <span >{{ data[0].name }}</span>
                    <p>Số lượt quan tâm: {{ data[1].length }} <i class="fa fa-heart text-danger" aria-hidden="true"></i></p>
                    <p>Số lượng công thức: {{ count }} <i class="fa fa-cutlery color-rate" aria-hidden="true"></i></p>
                </div>
                <div class="care-users">
                    <h4>Những người quan tâm bạn</h4>
                    <ul v-for="data in data[2]">
                        <li class="inner" v-for="property in data.users">
                            <img :src="config_path + property.avatar" alt="">{{ property.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="infomation row">
                <div class="inner-infomation">
                    <h3>Thông tin cá nhân</h3>
                    <div>
                        <div class="name-user">
                            <label>Tên tài khoản: {{ data[0].name }} </label>
                        </div>
                        <div>
                            <label>Tên mới</label>
                            <input type="text" v-model="info.name">
                            <div class="error" v-if="errors.length">
                                <span v-for="err in errors">
                                   {{ err[0] }} <br>
                               </span>
                               <hr>
                            </div>
                        </div>
                        <div class="image">
                            <label>Thay đổi avatar</label>
                            <input type="file" v-on:change="selectedAvatar" multiple>
                        </div>
                        <div class="button-create">
                            <button @click="EditProfile(user)" class="btn btn-warning edit-profile">Edit</button>
                        </div>
                    </div>
                    <h3>Các công thức của bạn</h3>
                    <div>
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th col="">Hình ảnh</th>
                                    <th>Tên công thức</th>
                                    <th class="text-center">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody v-for="myRecipe in myRecipes">
                                <tr>
                                    <td>
                                        <a :href="url_recipes + myRecipe.id">
                                            <img :src="config_path + myRecipe.avatar" alt="" width="70px" height="50px">
                                        </a>
                                    </td>
                                    <td><span>{{ myRecipe.name }}</span></td>
                                    <td class="bg-warning text-center text-center text-warning" v-if="myRecipe.status == 1">
                                        <span>{{ status.pending }}</span>
                                        <button class="btn-danger" @click="changeDisable(myRecipe)">Disable</button>
                                    </td>
                                    <td class="bg-success text-center text-success" v-else-if="myRecipe.status == 2">
                                        <span>{{ status.confirm }}</span>
                                        <button @click="changeNone(myRecipe)">None</button>
                                    </td>
                                    <td class="bg-danger text-center text-danger" v-else-if="myRecipe.status == 0">
                                        <span>{{ status.disable }}</span>
                                        <button class="btn-warning" @click="changePending(myRecipe)">Pending</button>
                                    </td>
                                    <td class=" text-center text-primary" v-else="">
                                        <span>{{ status.none }}</span>
                                        <button class="btn-success" @click="changeShow(myRecipe)">Show</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-7">
                        <h3>Các công thức bạn đã thích</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th col="">Hình ảnh</th>
                                    <th>Tên công thức</th>
                                </tr>
                            </thead>
                            <tbody v-for="object in data[3]">
                                <tr v-for ="property in object.recipe">
                                    <td>
                                        <a :href="url_recipes + property.id">
                                            <img :src="config_path + property.avatar" alt="" width="70px" height="50px">
                                        </a>
                                    </td>
                                    <td><span>{{ property.name }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <h3>Những người bạn đang quan tâm</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th col="">Hình ảnh</th>
                                    <th>Tên công thức</th>
                                </tr>
                            </thead>
                            <tbody v-for="object in data[2]">
                                <tr v-for ="property in object.users_you_care">
                                    <td><img :src="config_path + property.avatar" alt="" width="70px" height="50px"></td>
                                    <td><span>{{ property.name }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                status: {
                    pending: 'Pending',
                    confirm: 'Confirm',
                    disable: 'Disable',
                    none: 'None',
                },
                info: {
                    name: '',
                    avatar: ''
                },
                data: [],
                errors: [],
                myRecipes: [],
                config_path: 'http://cookingrecipe.herokuapp.com/',
                url_recipes: 'http://cookingrecipe.herokuapp.com/recipes/'
            }
        },
        created() {
            this.getDetails(),
            this.getMyRecipes()
        },
        methods: {
            EditProfile(user) {
                console.log(this.info.name)
                axios.put('/edit-profile/' + user.id, {
                    name: this.info.name,
                    avatar: this.info.avatar,
                })
                .then(response => {
                    alert(response.data.result)
                })
                .catch(error => {
                    this.errors = []
                    if(error.response.data.errors.name) {
                        this.errors.push(error.response.data.errors.name)
                    }
                })
            },
            changeNone(myRecipe) {
                this.myRecipes.forEach(function(element) {
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
                this.myRecipes.forEach(function(element) {
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
                this.myRecipes.forEach(function(element) {
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
                this.myRecipes.forEach(function(element) {
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
            getDetails() {
                axios.get('/profile')
               .then(response => {
                   this.data = response.data
               })
               .catch(error => {
                   console.log(error)
               })
            },
            getMyRecipes() {
                axios.get('/get-my-recipes')
               .then(response => {
                   this.myRecipes = response.data
               })
               .catch(error => {
                   console.log(error)
               })
            },
            selectedAvatar(event) {
                var fileReader = new FileReader();
                fileReader.readAsDataURL(event.target.files[0]);
                fileReader.onload = (event) => {
                    this.info.avatar = event.target.result;
                }
            },
            createAvatar(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.info.avatar = e.target.result;
                };
                reader.readAsDataURL(file);
            },
        },
        computed:{
            count() {
                let count = 0;
                let i;
                let a = this.myRecipes;

                for (i in a) {
                    if (a.hasOwnProperty(i)) {
                        count++;
                    }
                }
                return count;
            },
       },
    }
</script>

<style lang="scss" scoped>
    .error {
        color: red;
    }
</style>
