<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import Table from '@/Components/Table.vue';
</script>

<template>
    <Head title="Tableau de bord" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h4>Bienvenue {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}</h4>
        </template>

        
        <div v-if="$page.props.auth.user.is_admin" id="tableContainer">
            <Table :users="$page.props.users"></Table>
        </div>
        <div v-else id="main-container" class="bg-white mx-auto p-5 rounded-4">
            <div class="mx-auto">
                <h1 class="mb-3">Informations utilisateur</h1>
                <hr/>
                <ul class="p-0 mx-3">
                    <li class="mt-5">
                        <div class="row">
                            <label class="col-4">Identifiant :</label>
                            <span class="col">{{ $page.props.auth.user.user_name }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Nom :</label>
                            <span class="col">{{ $page.props.auth.user.last_name }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Prénom :</label>
                            <span class="col">{{ $page.props.auth.user.first_name }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Email :</label>
                            <span class="col">{{ $page.props.auth.user.email }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Téléphone :</label>
                            <span class="col">{{ $page.props.auth.user.phone }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Adresse :</label>
                            <span class="col">{{ $page.props.auth.user.address }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Code postal :</label>
                            <span class="col">{{ $page.props.auth.user.zip_code }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Ville :</label>
                            <span class="col">{{ $page.props.auth.user.town }}</span>
                        </div>
                    </li>
                    <li class="mt-4">
                        <div class="row">
                            <label class="col-4">Commentaire :</label>
                            <span class="col text-pre-wrap">{{ $page.props.auth.user.comment }}</span>
                        </div>
                    </li>
                    <li class="mt-5">
                        <a :href="route('dashboard.edit', $page.props.auth.user.id)" class="btn btn-primary btn-lg w-25">
                            Modifier
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>