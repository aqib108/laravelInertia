<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Table from '@/Components/Table.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectBox from '@/Components/SelectBox.vue';
import { ref } from 'vue';
const isShowForm = ref(false);

defineProps({
    users: {
        type: Array,
    },
    columns :{
        type:Array
    },
    roles : {
        type:Array
    }
    
});
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role : '',
});

const submit = () => {
    form.post(route('user.create'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
const createUserForm = () => {
    isShowForm.value = true;
};

const closeModal = () => {
    isShowForm.value = false;

    form.reset();
};
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text">Users</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <button type="button"  @click="createUserForm" class="btn btn-primary text-dark">Create User</button>
                        <Modal :show="isShowForm" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Create User Account
                </h2>
                <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Role" />

                <SelectBox
                    id="role"
                    type="role"
                    class="mt-1 block w-full"
                    v-model="form.role"
                    :items="roles"
                    required
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <div class="flex items-center justify-end mt-4">
               

                <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
        
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

            </div>
        </form>
                

             
            </div>
         </Modal>
                         <Table :columns="columns" :data="users"></Table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
