<template>
    <q-layout view="hHh lpr fFf">
        <q-header elevated class="bg-primary text-white" height-hint="98">
            <q-toolbar>
                <q-btn dense flat round icon="menu" @click="toggleLeftDrawer" />

                <q-toolbar-title>
                    <Link :href="route('dashboard')">
                        <q-avatar>
                            <img
                                src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg"
                            />
                        </q-avatar>
                    </Link>
                    Title
                </q-toolbar-title>

                <div
                    class="flex items-end justify-end sm:flex sm:items-center sm:ms-6"
                >
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button
                                v-if="
                                    $page.props.jetstream.managesProfilePhotos
                                "
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"
                            >
                                <img
                                    class="h-8 w-8 rounded-full object-cover"
                                    :src="
                                        $page.props.auth.user.profile_photo_url
                                    "
                                    :alt="$page.props.auth.user.name"
                                />
                            </button>

                            <span v-else class="inline-flex rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"
                                >
                                    {{ $page.props.auth.user.name }}

                                    <svg
                                        class="ms-2 -me-0.5 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Account
                            </div>

                            <DropdownLink :href="route('profile.show')">
                                Profile
                            </DropdownLink>

                            <div class="border-t border-gray-200" />

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Log Out
                                </DropdownLink>
                            </form>
                        </template>
                    </Dropdown>
                </div>
            </q-toolbar>

            <q-tabs align="left">
                <Link :href="route('upload')">
                    <q-tab name="upload" label="Upload"
                /></Link>
                <Link :href="route('reporting.show')">
                    <q-tab name="upload" label="Reporting"
                /></Link>
                <Link :href="route('leave.show')">
                    <q-tab name="upload" label="Leave"
                /></Link>
                <!-- <q-route-tab :href="route('upload')" label="Upload Excel" /> -->
                <!-- <q-route-tab
                    :href="route('reporting.show')"
                    label="Reporting"
                />
                <q-route-tab :href="route('leave.show')" label="Leave" /> -->
            </q-tabs>
        </q-header>

        <q-drawer v-model="leftDrawerOpen" side="left" overlay bordered>
            <!-- drawer content -->
        </q-drawer>

        <q-page-container>
            <slot />
        </q-page-container>

        <q-footer elevated class="bg-grey-8 text-white">
            <q-toolbar>
                <q-toolbar-title>
                    <q-avatar>
                        <img
                            src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg"
                        />
                    </q-avatar>
                    <div>Title</div>
                </q-toolbar-title>
            </q-toolbar>
        </q-footer>
    </q-layout>
</template>

<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

defineProps({
    title: String,
});

const logout = () => {
    router.post(route("logout"));
};
const leftDrawerOpen = ref(false);

function toggleLeftDrawer() {
    leftDrawerOpen.value = !leftDrawerOpen.value;
}
</script>
