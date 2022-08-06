<script setup>
    import { Link } from "@inertiajs/inertia-vue3"

    defineProps({
        users: Object
    })
</script>

<template>
    <table class="table table-striped table-bordered mb-0">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Identifiant
                </th>
                <th>
                    Prénom
                </th>
                <th>
                    Nom
                </th>
                <th>
                    Email
                </th>
                <th>
                    Téléphone
                </th>
                <th>
                    Adresse
                </th>
                <th>
                    Code postal
                </th>
                <th>
                    Ville
                </th>
                <th>
                    Commentaire
                </th>
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(user, index) in users">
                <td v-for="(value, field) in user">{{ value }}</td>
                <td class="text-center p-3">
                    <div class="d-flex">
                        <Link :href="route('dashboard.edit', user.id)" method="get" as="button" 
                            type="button" class="btn ml-3 rounded-0">
                            <i class="fa fa-edit fa-lg"></i>
                        </Link>
                        <Link :href="route('users.destroy', user.id)" method="delete" as="button" 
                            type="button" class="btn ml-3 rounded-0">
                            <i class="fa fa-trash-o fa-lg"></i>
                        </Link>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>