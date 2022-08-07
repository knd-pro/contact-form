<script setup>
    import { ref } from 'vue';
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="d-flex collapse navbar-collapse justify-content-between px-5">
            <header v-if="$slots.header">
                <div class="my-2 py-6">
                    <slot name="header" />
                </div>
            </header>
            <a :href="route('logout')" method="get" class="navbar-text">
                <i class="bi bi-box-arrow-left"></i>
                <label class="mx-2">Déconnexion</label>
            </a>
        </div>
    </nav>
    <main class="my-5">
        <slot />
    </main>
</template>
