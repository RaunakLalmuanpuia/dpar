<template>
    <AppLayout>
        <h4>Reporting</h4>
        <div class="q-pa-md">
            <q-table
                title="Reporting"
                :rows="props.reporting"
                :columns="columns"
                row-key="name"
            />
        </div>
        <!-- {{ reporting }} -->
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/QuasarLayout.vue";
const props = defineProps({
    reporting: Object,
});

const columns = [
    { name: "name", label: "Name", field: "name", align: "left" },
    { name: "email", label: "Email", field: "email", align: "left" },
    { name: "age", label: "Age", field: "age", align: "left" },
];
</script>
