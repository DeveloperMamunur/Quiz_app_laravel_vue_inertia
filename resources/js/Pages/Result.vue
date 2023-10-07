<script setup>
import Layout from '@/Shared/Layout.vue';
    defineProps({
        parcentage:Number,
        comment:String
    })
</script>

<template>
    <Layout>
        <div class="quiz_app">
            <div class="px-4 py-5 my-5 text-center">
                <h1 class="display-5 fw-bold">{{comment}}</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4 fs-4 fw-bold">Your Score is {{ parcentage }}%</p>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
    .quiz_app{
    width: 500px;
    min-height: 600px;
    padding: 15px;
    border: 3px solid #ff00ff;
    border-radius: 20px;
    margin: auto;
    background: #00ffff;
    color: #e000ff;
}
h1{
    color: #e000ff;
}
</style>
