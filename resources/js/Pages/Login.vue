<script setup>
    import BreezeGuestLayout from '@/Layouts/Guest.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import { Head, useForm } from '@inertiajs/inertia-vue3';

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        user_name: '',
        password: '',
        remember: false
    });

    const submit = () => {
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Connexion" />

        <BreezeValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="user_name">Nom d'utilisateur</label>
                <input id="user_name" type="text" class="form-control mt-3" v-model="form.user_name" required autofocus autocomplete="user_name" />
            </div>

            <div class="form-group mt-3">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" class="form-control mt-3" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="form-group mt-3">
                <label>
                    <input type="checkbox" name="remember" :checked="form.remember" />
                    <span class="mx-3">Rester connecté</span>
                </label>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-9 text-left">
                    <a :href="route('register')">Pas de compte ?</a>
                </div>

                <button class="col btn btn-primary" type="submit">Connexion</button>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
