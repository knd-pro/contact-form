<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <BreezeAuthenticatedLayout v-if="$page.props.auth.user">
        <Head title="Modification" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bienvenue {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}
            </h2>
        </template>

        <user-form :user="$page.props.user" :form_type="'edit'"></user-form>
    </BreezeAuthenticatedLayout>

    <div v-else>
        <Head title="Inscription" />
        <user-form></user-form>
    </div>
</template>