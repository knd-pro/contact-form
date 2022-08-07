<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <BreezeAuthenticatedLayout v-if="$page.props.auth.user">
        <Head title="Modification" />
        <template #header>
            <h4>Modification d'utilisateur</h4>
        </template>

        <user-form :user="$page.props.user" :form_type="'edit'"></user-form>
    </BreezeAuthenticatedLayout>

    <div v-else class="h-100 w-100">
        <Head title="Inscription" />
        <user-form></user-form>
    </div>
</template>