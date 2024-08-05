<template>
    <AppLayout>
        <div
            v-if="$page.props.flash.message"
            class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert"
        >
            <span class="font-medium">
                {{ $page.props.flash.message }}
            </span>
        </div>
        <h4>Upload Excel file</h4>
        <div class="q-pa-md flex justify-evenly">
            <div class="q-gutter-md" style="max-width: 300px">
                <q-file
                    outlined
                    v-model="reportForm.file"
                    label="Upload Reporting Excel"
                >
                    <template v-slot:prepend>
                        <q-icon name="attach_file" />
                    </template>
                </q-file>
                <q-btn
                    flat
                    bordered
                    rounded
                    color="primary"
                    label="Upload File"
                    v-close-popup
                    @click="submitReporting"
                />
            </div>
            <div class="q-gutter-md" style="max-width: 300px">
                <q-file
                    outlined
                    v-model="leaveForm.file"
                    label="Upload Leave Excel"
                >
                    <template v-slot:prepend>
                        <q-icon name="attach_file" />
                    </template>
                </q-file>
                <q-btn
                    flat
                    bordered
                    rounded
                    color="primary"
                    label="Upload File"
                    v-close-popup
                    @click="submitLeave"
                />
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/QuasarLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import { Head } from "@inertiajs/vue3";

import { ref } from "vue";

import { useForm } from "@inertiajs/vue3";

const reportForm = useForm({
    file: null,
    type: "excel",
});

const leaveForm = useForm({
    file: null,
    type: "excel",
});

const model = ref(null);

const submitReporting = () => {
    //   form.file = file.value;
    reportForm.post(route("uploadReportingStore"), {
        onSuccess: () => {
            // Handle success, e.g., show a notification
        },
        onError: (errors) => {
            // Handle errors
        },
    });
};

const submitLeave = () => {
    //   form.file = file.value;
    leaveForm.post(route("uploadLeaveStore"), {
        onSuccess: () => {
            // Handle success, e.g., show a notification
        },
        onError: (errors) => {
            // Handle errors
        },
    });
};
</script>
