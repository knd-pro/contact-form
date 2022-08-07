<script setup>
    import { useForm } from '@inertiajs/inertia-vue3';

    defineProps({
        users: Object
    });

    const form = useForm();

    const submit = (user) => {
        form.delete(route('users.destroy', user.id));
    };
</script>

<template>
    <table class="table mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Identifiant</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Commentaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(user, index) in users">
                <td v-for="(value, field) in user" class="text-pre-wrap">{{ value }}</td>
                <td class="text-center p-3">
                    <div class="d-flex">
                        <a :href="route('dashboard.edit', user.id)" class="btn btn-primary">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form @submit.prevent="submit(user)">
                            <button type="submit" class="btn btn-danger mx-3">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>