<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer class="py-3 my-4 bg-dark">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><Link href="/" class="nav-link px-2 text-light">Home</Link></li>
        <li class="nav-item"><Link href="/quiz" class="nav-link px-2 text-light">Quiz</Link></li>
        <li class="nav-item"><Link href="/questions" class="nav-link px-2 text-light">Question</Link></li>
        </ul>
        <p class="text-center text-light">&copy;2023 Md Mamunur Rashid, All right Reserved</p>
  </footer>
</template>
