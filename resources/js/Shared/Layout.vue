<script setup>
import Header from '@/Shared/Header.vue';
import Footer from '@/Shared/Footer.vue';
</script>

<template>
        <Header />
    <div class="container">
        <div style="min-height: 70vh;" class="py-4">
            <slot />
        </div>
    </div>
        <Footer />
</template>
