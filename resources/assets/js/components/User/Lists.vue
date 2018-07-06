<template>
    <div class="fillter-item">
        <span v-show="todos[0].courses == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.courses">
                {{ property }}
            </span>
        </span>
        <span v-show="todos[0].dish_types == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.dish_types">
                {{ property }}
            </span>
        </span>
        <span v-show="todos[0].materials == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.materials">
                {{ property }}
            </span>
        </span>
        <span v-show="todos[0].diffculties == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.diffculties">
                {{ property }}
            </span>
        </span>
        <span v-show="todos[0].occasions == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.occasions">
                {{ property }}
            </span>
        </span>
        <span v-show="todos[0].cuisines == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.cuisines">
                {{ property }}
            </span>
        </span>
        <span v-show="todos[0].cooking_methods == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.cooking_methods">
                {{ property }}
            </span>
        </span>
        <span v-show="todos[0].purposes == textSelected" @click="selectText">
            <span class="items" v-for="property in lists.purposes">
                {{ property }}
            </span>
        </span>
    </div>
</template>

<script>
    export default {
        props: {
            textSelected: {
                type: String
            }
        },
        data() {
            return {
                lists: [],
                todos: [
                    {
                        courses: 'Thực đơn',
                        dish_types: 'Loại món',
                        materials: 'Nguyên liệu',
                        diffculties: 'Độ khó',
                        occasions: 'Dịp lễ',
                        cuisines: 'Ẩm thực',
                        cooking_methods: 'Cách thực hiện',
                        purposes: 'Mục đích',
                    },
                ],
                text: ''
            }
        },
        created() {
            this.getLists()
        },
        methods: {
            getLists() {
            axios.get('/get-lists')
               .then(response => {
                   this.lists = response.data
               })
               .catch(error => {
                   console.log(error)
               })
            },
            selectText: function(list) {
                this.text = list.target.innerText
                alert('Chức năng tìm kiếm tạm thời đang bị lỗi!')
                // console.log(this.text)

                // axios.post('/find-text', {
                //     text: this.text,
                // })
            },
        }
    }
</script>
