<template>
    <div class="container">
        <div class="row g-4">
            <div class="col">
                <div class="card d-flex flex-row">
                    <img v-if="post.image" :src="'/storage/'+post.image" class="card-img-top w-25" :alt="post.title">
                    <img v-else src="/storage/uploads/default.png" class="card-img-top w-25" :alt="post.title">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ post.content }}</p>
                    </div>
                </div>
                <router-link class="btn btn-info mt-2" :to="{ name: 'home' }">Torna alla home</router-link>
                <router-link class="btn btn-info mt-2" :to="{ name: 'posts' }">Torna ai post</router-link>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    name: 'Post',
    props: ['id'],
    data() {
        return {
            post: [],
        }
    },
    created() {
        const url = 'http://127.0.0.1:8000/api/v1/posts/' + this.id;
        this.getPost(url);
    },
    methods: {
        getPost(url){
            Axios.get(url).then(
                (result) => {
                console.log(result);
                this.post = result.data.results.data;
                });
        }
    }
}
</script>

<style lang="scss">
</style> 