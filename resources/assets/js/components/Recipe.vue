<template>
<div class="member-recipe container">
    <div class="row">
        <div class="result-list">
            <div class="result-recipe-number">
                <p>
                    <h3><span class="text-danger">{{ count }}</span> Công thức nấu ăn ngon</h3>
                </p>
                <button id="show-modal" @click="showModal = true" class="btn-recipe btn btn-success text_white">Tạo công thức + </button>
            </div>
            <div class="cooky-fillter">
                <div class="fillter-bar">
                    <div class="fillter-properties">
                        <div class="fillter-property" v-for="list in lists">
                            <div class="property" @click="lists_courses">
                                {{ list.name }}<span class="fa fa-caret-down"></span>
                            </div>
                        </div><!-- end fillter property -->
                    </div><!-- end fillter properties -->
                    <div class="pull-right">
                        <div class="sortby">
                            <span class="label">Sắp xếp: </span>
                            <select class="selection">
                                <option value="1">Đánh gía</option>
                                <option value="2">Mới nhất</option>
                                <option value="3">Lượt xem</option>
                                <option value="4">Yêu thích</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="search-fillter-box">
                    <div class="fillter-group">
                        <Lists :textSelected = "textSelected"></Lists>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="items" v-for="recipe in list_recipes">
            <div class="col-md-3 item">
                <div class="inner_item">
                    <div class="image">
                        <a :href="url_recipes + recipe.id">
                            <img :src=" config_path + recipe.avatar">
                        </a>
                    </div>
                     <div class="content-items">
                        <a href="/">
                            <p><b>{{ recipe.name }}</b></p>
                        </a>
                        <p>
                            <span class="text-pale">{{ recipe.diffculty }}</span>
                            | <span class="text-pale">{{ recipe.materials.main_material }}</span>
                        </p>
                        <p class="text-pale">Công thức bởi: <b>{{ recipe.created_by }}</b></p>
                    </div>
                    <div class="likes-number">
                        <span><i class="fa fa-thumbs-o-up" aria-hidden="true"> {{ recipe.likes.length }}</i></span>
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ recipe.time }}</span>
                    </div>
                     <div class="vote">
                        <span><i class="fa fa-star color-yellow" aria-hidden="true"> {{ recipe.average }}</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD RECIPE -->
    <div class="row add-recipe">
        <div class="col-md-8 col-md-offset-2">
            <!-- <form if="myForm" @submit.prevent="createRecipe"> -->
                <div>
                    <label for="">Ảnh đại diện</label>
                    <input type="file" v-on:change="selectedAvatar">
                </div>
                <div>
                    <label for="">Tên món ăn</label>
                    <input type="text" v-model="recipe.name" class="form-control" placeholder="Nhập tên công thức">
                </div>

                <div>
                    <label for="">Lợi ích</label>
                    <input type="text" v-model="purposes.purpose" class="form-control" placeholder="Tăng canxi, tăng cân, gỉam cân">
                </div>

                <div class="dish-type">
                    <h4>Loại món ăn</h4>
                    <div v-for="(dish_type, index) in listDishTypes">
                        <input type="radio" v-model="recipe.dish_type_id" :value="index"> {{ dish_type }}
                    </div>
                </div>

                <div class="dish-type">
                    <h4>Cách thực hiện</h4>
                    <div v-for="(cooking_method, index) in listCookingMethods">
                        <input type="radio" v-model="recipe.cooking_method_id" :value="index"> {{ cooking_method }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label>Phần ăn</label>
                        <input v-model.number="recipe.section" type="number" class="time" placeholder="0">
                    </div>
                    <div class="col-md-8">
                        <label>Thực đơn</label>
                        <select class="" v-model="courses.course">
                            <option v-for="course in listCourses" :value="course">{{ course }}</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 padding-reduce">
                        <label class="" for="">Độ khó, thời gian làm</label>
                        <select v-model="recipe.diffculty_id" class="">
                            <option disabled value="">-------------------</option>
                            <option value="1">Dễ</option>
                            <option value="2">Bình thường</option>
                            <option value="3">Khó</option>
                        </select>
                        <input v-model.number="recipe.time" type="number" class="time" placeholder="0">
                    </div>
                    <div class="col-md-5 padding-reduce">
                        <label class="">Ẩm thực</label>
                        <input class="cuisine" type="text" v-model="recipe.cuisine" placeholder="Ex: Vietnamese">
                    </div>
                </div>

                <hr>
                <h3>Nguyên liệu</h3>
                    <div>
                        <label for="">Nguyên liệu chính</label>
                        <input type="text" v-model="material.main_material" class="form-control" placeholder="Nguyên liệu chính">
                    </div>
                    <div>
                        <label for="">Nguyên liệu</label>
                        <input type="text" v-model="material.material" class="form-control" placeholder="Ex: 100gr thịt">
                    </div>
                    <span class="text-danger">Hưóng dẫn cách nhập: Số lượng nguyên liệu_tên nguyên liệu, ...</span><br>
                    <span class="text-danger">VD: 100gr thịt, 20gr muối, 3 lá bạc hà</span>
                <hr>
                <h3>Cách làm</h3>
                <div>
                    <div class="step-cooking" v-for="(value, key) in appends">
                        <div class="inner-step-cooking">
                            <span>{{ key + 1 }}</span>
                        </div>
                        <input type="text" @change="onChange('text', key, $event)" :value="value.text" class="form-control" placeholder="Hãy nhập cách làm">
                        <!-- <div class="" v-if="image.images">
                            <img :src="image" alt="" height="70" width="90">
                        </div>
                        <div class="image">
                            <input type="file" v-on:change="selectedImage" multiple>
                        </div> -->
                        <button type="button" @click="onDelete(key)" class="btn btn-danger delete-step">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                </div>
                <div class="add-step-cook">
                    <button @click="onAppend" class="btn btn-success"> + Thêm bước làm</button>
                </div>
                <div class="create-recipe">
                    <button @click="createRecipe" class="btn btn-info">Lưu</button>
                </div>
            <!-- </form> -->
            <div class="error" v-if="errors.length">
                <span v-for="err in errors">
                   {{ err[0] }} <br>
               </span>
               <hr>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import Lists from './User/Lists.vue'
   export default {
        components: {
            Lists,
        },
       data() {
           return {
               recipe: {
                   name: '',
                   time: 0,
                   section: 1,
                   cuisine: '',
                   avatar: '',
                   diffculty_id: '',
                   dish_type_id: '',
                   cooking_method_id: '',
               },
               courses: {
                course: []
               },
               making: {
                make: []
               },
               material: {
                    main_material: '',
                    material: [],
               },
               purposes: {
                purpose: []
               },
               // image: {
               //      images: [],
               // },
               lists: [
                    { name: 'Thực đơn' },
                    { name: 'Loại món' },
                    { name: 'Nguyên liệu' },
                    { name: 'Độ khó' },
                    { name: 'Dịp lễ' },
                    { name: 'Ẩm thực' },
                    { name: 'Cách thực hiện' },
                    { name: 'Mục đích' },
                ],
               errors: [],
               list_recipes: [],
                config_path: 'http://localhost:8000/',
                url_recipes: 'http://localhost:8000/recipes/',
                url: '/',
                textSelected: 'Thực đơn',
                listDishTypes: [],
                listCookingMethods: [],
                listCourses: [],
                number: 1,
                appends: [
                    {text: '',}
                ],
                auth: [],
                // isHide: false
           }
       },
       created() {
           this.getListRecipes(),
           this.getDishTypes(),
           this.getCookingMethods(),
           this.getCourses(),
           this.getAuth()
           // this.checkAuth()
           // console.log(typeof this.auth),
           // console.log(this.list_recipes.length)
                // console.log(this.$el);
       },
       methods: {
            getAuth() {
                axios.get('/get-auth-current')
                .then(response => {
                    this.auth = response.data
                })
            },
            // checkAuth() {
            //     // if (this.auth instanceof Object) {
            //     //     this.isHide = false;
            //     // }
            //     console.log(this.auth.id);
            //     let count = 0;
            //     for (var c in this.auth) {
            //         count = count + 1;
            //     }
            //     console.log(count);
            //     // console.log(Object.keys(this.auth));
            //     // if (this.auth == "") {
            //     //     this.isHide = false;
            //     // }
            //     // else {
            //     //     this.isHide = true;
            //     // }
            // },
            getDishTypes() {
                axios.get('/dish-types')
                .then(response => {
                    this.listDishTypes = response.data
                })
            },
            getCookingMethods() {
                axios.get('/cooking-methods')
                .then(response => {
                    this.listCookingMethods = response.data
                })
            },
            getCourses() {
                axios.get('/courses')
                .then(response => {
                    this.listCourses = response.data
                })
            },
            getListRecipes() {
               axios.get('/recipes')
               .then(response => {
                   this.list_recipes = response.data
               })
               .catch(error => {
                   console.log(error)
               })
           },
           createRecipe() {
                axios.post('/recipes', {
                    name: this.recipe.name,
                    time: this.recipe.time,
                    section: this.recipe.section,
                    making: this.appends,
                    cuisine: this.recipe.cuisine,
                    avatar: this.recipe.avatar,
                    dish_type: this.recipe.dish_type_id,
                    diffculty: this.recipe.diffculty_id,
                    login: this.auth.id,
                    cooking_method: this.recipe.cooking_method_id,
                    main_material: this.material.main_material,
                    material: this.material.material,
                    purpose: this.purposes.purpose,
                    course: this.courses.course,
                    // image: this.image.images,
                })
                .then(response => {
                    alert(response.data.result);
                    // document.getElementById("app").reset();
                })
                .catch(error => {
                    this.errors = []
                    if(error.response.data.errors.name) {
                        this.errors.push(error.response.data.errors.name)
                    }
                    if(error.response.data.errors.time) {
                        this.errors.push(error.response.data.errors.time)
                    }
                    if(error.response.data.errors.section) {
                        this.errors.push(error.response.data.errors.section)
                    }
                    if(error.response.data.errors.cuisine) {
                        this.errors.push(error.response.data.errors.cuisine)
                    }
                    if(error.response.data.errors.diffculty) {
                        this.errors.push(error.response.data.errors.diffculty)
                    }
                    if(error.response.data.errors.dish_type) {
                        this.errors.push(error.response.data.errors.dish_type)
                    }
                    if(error.response.data.errors.cooking_method) {
                        this.errors.push(error.response.data.errors.cooking_method)
                    }
                    if(error.response.data.errors.avatar) {
                        this.errors.push(error.response.data.errors.avatar)
                    }
                    if(error.response.data.errors.make) {
                        this.errors.push(error.response.data.errors.make)
                    }
                    if(error.response.data.errors.purpose) {
                        this.errors.push(error.response.data.errors.purpose)
                    }
                    if(error.response.data.errors.course) {
                        this.errors.push(error.response.data.errors.course)
                    }
                    if(error.response.data.errors.login) {
                        this.errors.push(error.response.data.errors.login)
                    }
                })
            },
            // selectedImage(e) {
            //     let files = e.target.files || e.dataTransfer.files;
            //     if (!files.length)
            //         return;
            //     this.createImage(files[0]);
            // },
            // createImage(file) {
            //     let reader = new FileReader();
            //     let vm = this;
            //     reader.onload = (e) => {
            //         vm.image.images = e.target.result;
            //     };
            //     reader.readAsDataURL(file);
            // },
            selectedAvatar(event) {
                var fileReader = new FileReader();
                fileReader.readAsDataURL(event.target.files[0]);
                fileReader.onload = (event) => {
                    this.recipe.avatar = event.target.result;
                }
            },
            createAvatar(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.recipe.avatar = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            lists_courses: function(list) {
                this.textSelected = list.target.innerText
            },
            onAppend() {
                this.appends.push(
                    {
                        text: '',
                    },
                );
            },
            onDelete(key) {
                this.appends = this.appends.fillter((s, i) => i!== key)
            },
            onChange(text, key, e) {
                let value = e.target.value
                this.appends[key][text] = value
            }
       },
       computed:{
            count() {
                let count = 0;
                let i;
                let a = this.list_recipes;

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
</style>
