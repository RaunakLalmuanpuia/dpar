<template>
    <AppLayout>
        <h4>Leave</h4>
        <div class="q-pa-md">
            <q-table
                title="Leave"
                :rows="props.leave"
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
    leave: Object,
});

const columns = [
    { name: "name", label: "Name", field: "name", align: "left" },
    { name: "email", label: "Email", field: "email", align: "left" },
    { name: "age", label: "Age", field: "age", align: "left" },
];
</script>
