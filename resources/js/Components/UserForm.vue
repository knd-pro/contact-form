<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import {watch} from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import axios from "axios";

const props = defineProps({
    user: Object,
    form_type: String,
});

const form = useForm({
    errors: {},
    user_name: props.user?.user_name,
    last_name: props.user?.last_name,
    first_name: props.user?.first_name,
    email: props.user?.email,
    phone: props.user?.phone,
    address: props.user?.address,
    zip_code: props.user?.zip_code,
    town: props.user?.town,
    comment: props.user?.comment,
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    window.scrollTo({top: 0, left: 0, behavior: 'instant'});
    if (props.form_type == 'edit') {
        form.put(route('users.update', props.user?.id), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    } else {
        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    }
};

watch(() => form.email, (value) => {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value))
    {
        delete form.errors['email'];
    } else{
        form.errors['email'] = 'Email invalide';
    }
});

watch(() => form.zip_code, (value) => {
    if (/^\d{5}$/.test(value))
    {
        fetchTown(value);
        delete form.errors['zip_code'];
    } else{
        form.errors['zip_code'] = 'Code postal invalide';
    }
});

const fetchTown = (value) => {
    (async() => {
        let res = null;
        try {
            res = await axios.get(`https://apicarto.ign.fr/api/codes-postaux/communes/${value}`);
            form.town = res.data[0].nomCommune;
        } catch (err) {}
    })();
}
</script>

<template>
    <BreezeGuestLayout>
        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit" method="update">
            <div class="form-group">
                <label for="user_name">Nom d'utilisateur</label>
                <input id="user_name" type="text" class="form-control mt-1" v-model="form.user_name" required autofocus autocomplete="user_name"/>
            </div>

            <div class="form-group mt-4">
                <label for="last_name">Nom</label>
                <input id="last_name" type="text" class="form-control mt-1" v-model="form.last_name" required autocomplete="last_name" />
            </div>

            <div class="form-group mt-4">
                <label for="first_name">Prénom</label>
                <input id="first_name" type="text" class="form-control mt-1" v-model="form.first_name" required autocomplete="first_name" />
            </div>

            <div class="form-group mt-4">
                <label v-if="form.errors.email" for="email" class="error">{{ form.errors.email }}</label>
                <label v-else for="email">Email</label>
                <input id="email" type="email" class="form-control mt-1" v-model="form.email" required autocomplete="username" />
            </div>

            <div class="form-group mt-4">
                <label for="phone">Numéro de téléphone</label>
                <input id="phone" type="tel" class="form-control mt-1" v-model="form.phone" required autocomplete="phone" />
            </div>

            <div class="form-group mt-4">
                <label for="address">Adresse</label>
                <input id="address" type="text" class="form-control mt-1" v-model="form.address" required autocomplete="address" />
            </div>

            <div class="form-group mt-4">
                <label v-if="form.errors.zip_code" for="zip_code" class="error">{{ form.errors.zip_code }}</label>
                <label v-else for="zip_code">Code postal</label>
                <input id="zip_code" type="text" class="form-control mt-1" v-model="form.zip_code" required autocomplete="zip_code" />
            </div>

            <div class="form-group mt-4">
                <label for="town">Ville</label>
                <input id="town" type="text" class="form-control mt-1" v-model="form.town" required autocomplete="town" />
            </div>

            <div class="form-group mt-4">
                <label for="comment">Commentaire</label>
                <textarea id="comment" type="text" class="form-control mt-1" v-model="form.comment" required autocomplete="comment"></textarea>
            </div>

            <div class="form-group mt-4">
                <label v-if="$props.form_type == 'edit'" for="password">Mot de passe (facultatif)</label>
                <label v-else for="password">Mot de passe</label>
                <input id="password" type="password" class="form-control mt-1" v-model="form.password" autocomplete="new-password" />
            </div>

            <div class="form-group mt-4">
                <label v-if="$props.form_type == 'edit'" for="password_confirmation">Confirmer le mot de passe (facultatif)</label>
                <label v-else for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" class="form-control mt-1" v-model="form.password_confirmation" autocomplete="new-password" />
            </div>

            <div v-if="$props.form_type == 'edit'" class="d-flex mt-4 align-items-center justify-content-around">
                <a :href="route('dashboard.index')" class="btn btn-secondary w-25">Retour</a>
                <div class="w-25">
                    <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                    <button type="submit" class="btn btn-primary bg-primary w-100">
                        Modifier
                    </button>
                </div>
            </div>
            <div v-else class="d-flex mt-4 align-items-center justify-content-between">
                <a :href="route('login')">Déjà enregistré ?</a>
                <div>
                    <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                    <button type="submit" class="btn btn-primary bg-primary ml-4">Créer un compte</button>
                </div>
            </div>
        </form>
    </BreezeGuestLayout>
</template>