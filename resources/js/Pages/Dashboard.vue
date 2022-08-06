<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Table from '@/Components/Table.vue';
</script>

<template>
    <Head title="Tableau de bord" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bienvenue {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}
            </h2>
        </template>

        <div v-if="$page.props.auth.user.is_admin" class="p-8">
            <Table :users="$page.props.users"></Table>
        </div>
    </BreezeAuthenticatedLayout>
</template>