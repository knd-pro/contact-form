<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    user: Object
});

const form = useForm({
    user_name: props.user.user_name,
    last_name: props.user.last_name,
    first_name: props.user.first_name,
    email: props.user.email,
    phone: props.user.phone,
    address: props.user.address,
    zip_code: props.user.zip_code,
    town: props.user.town,
    comment: props.user.comment,
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.put(route('users.update', props.user.id), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Modification" />

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit" method="update">
            <div>
                <BreezeLabel for="user_name" value="Nom d'utilisateur" />
                <BreezeInput id="user_name" type="text" class="mt-1 block w-full" v-model="form.user_name" required autofocus autocomplete="user_name"/>
            </div>

            <div class="mt-4">
                <BreezeLabel for="last_name" value="Nom" />
                <BreezeInput id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name" required autocomplete="last_name" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="first_name" value="Prénom" />
                <BreezeInput id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" required autocomplete="first_name" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="phone" value="Numéro de téléphone" />
                <BreezeInput id="phone" type="tel" class="mt-1 block w-full" v-model="form.phone" required autocomplete="phone" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="address" value="Adresse" />
                <BreezeInput id="address" type="text" class="mt-1 block w-full" v-model="form.address" required autocomplete="address" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="zip_code" value="Code postal" />
                <BreezeInput id="zip_code" type="text" class="mt-1 block w-full" v-model="form.zip_code" required autocomplete="zip_code" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="town" value="Ville" />
                <BreezeInput id="town" type="text" class="mt-1 block w-full" v-model="form.town" required autocomplete="town" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="comment" value="Commentaire" />
                <BreezeInput id="comment" type="text" class="mt-1 block w-full" v-model="form.comment" required autocomplete="comment" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Mot de passe (facultatif)" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password_confirmation" value="Confirmer le mot de passe (facultatif)" />
                <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                <BreezeButton type="submit" class="ml-3 rounded-0">
                    Modifier
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>