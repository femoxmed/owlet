<template>
    <div>
        <heading class="mb-6">Conditions</heading>
        <div class="flex" style="">
            <div
                class="relative h-9 flex-no-shrink mb-6"
                data-children-count="1"
            ></div>
            <div class="w-full flex items-center mb-6">
                <div class="flex w-full justify-end items-center mx-3"></div>
                <div class="flex-no-shrink ml-auto">
                    <a
                        href="/plans/create"
                        class="btn btn-default btn-primary"
                        dusk="create-button"
                    >
                        Create Plans
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div
                v-if="errors"
                class="bg-red-500 text-dark py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg"
            >
                <div v-for="(v, k) in conditions" :key="k">
                    <p
                        v-for="error in v"
                        :key="error"
                        class="text-sm text-danger"
                    >
                        {{ error }}
                    </p>
                </div>
            </div>

            <div class="overflow-hidden overflow-x-auto relative" style="">
                <!-- table start -->
                <table
                    cellpadding="0"
                    cellspacing="0"
                    data-testid="resource-table"
                    class="table w-full table-default"
                >
                    <!-- table headers -->
                    <thead>
                        <tr>
                            <th class="w-16">&nbsp;</th>
                            <th class="text-left">
                                <span
                                    dusk="sort-id"
                                    class="cursor-pointer inline-flex items-center"
                                >
                                    ID
                                </span>
                            </th>

                            <th class="text-left">
                                <span
                                    dusk="sort-name"
                                    class="cursor-pointer inline-flex items-center"
                                >
                                    Name
                                </span>
                            </th>

                               <th class="text-left">
                                <span
                                    dusk="sort-name"
                                    class="cursor-pointer inline-flex items-center"
                                >
                                   Plan Code
                                </span>
                            </th>

                            <th class="text-left">
                                <span
                                    dusk="sort-email"
                                    class="cursor-pointer inline-flex items-center"
                                >
                                    Amount
                                </span>
                            </th>
                            <th class="text-left">
                                <span
                                    dusk="sort-email"
                                    class="cursor-pointer inline-flex items-center"
                                >
                                  Interval
                                </span>
                            </th>
                            <th class="text-left">
                                <span
                                    dusk="sort-email"
                                    class="cursor-pointer inline-flex items-center"
                                >
                                 Descriptiom
                                </span>
                            </th>
                           

                            <th class="text-left"><span>Actions</span></th>
                            <th>&nbsp;</th>
                        </tr>
                        <!-- end of table heads -->
                    </thead>

                    <!-- table borders start -->
                    <tbody>
                        <tr v-for="(item, index) in conditions" :key="index">
                            <td class="w-16" data-children-count="1">
                                <input
                                    type="checkbox"
                                    class="checkbox"
                                    data-testid="users-items-0-checkbox"
                                    dusk="1-checkbox"
                                />
                            </td>
                            <td>
                                <div class="text-left text-left">
                                    <a
                                        href="/admin/resources/users/1"
                                        class="no-underline dim text-primary font-bold"
                                    >
                                        {{ item.id }}
                                    </a>
                                </div>
                            </td>

                            <td>
                                <div class="text-left text-left">
                                    <span class="whitespace-no-wrap">{{
                                        item.name
                                    }}</span>
                                </div>
                            </td>
                             <td>
                                 <div class="text-left text-left">
                                    <span class="whitespace-no-wrap">{{
                                        item.plan_code
                                    }}</span>
                                </div>
                            </td>
                            <td>

                               
                                <div class="text-left text-left">
                                    <span class="whitespace-no-wrap">{{
                                        item.amount
                                    }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="text-left text-left">
                                    <span class="whitespace-no-wrap">{{
                                        item.interval
                                    }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="text-left text-left">
                                    <span class="whitespace-no-wrap">{{
                                        item.description
                                    }}</span>
                                </div>
                            </td>
                            

                            <td class="td-fit text-right pr-6 align-middle">
                                <div class="inline-flex items-center">
                                    <!---->
                                    <!-- <span class="inline-flex"
                                        ><a
                                            :href="'/condtions/' + item.id"
                                            class="cursor-pointer text-70 hover:text-primary mr-3 inline-flex items-center has-tooltip"
                                            data-testid="users-items-0-view-button"
                                            dusk="1-view-button"
                                            data-original-title="null"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="22"
                                                height="18"
                                                viewBox="0 0 22 16"
                                                aria-labelledby="view"
                                                role="presentation"
                                                class="fill-current"
                                            >
                                                <path
                                                    d="M16.56 13.66a8 8 0 0 1-11.32 0L.3 8.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 0 0 8.48 0L19.38 8l-4.24-4.24a6 6 0 0 0-8.48 0L2.4 8l4.25 4.24h.01zM10.9 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                                ></path></svg></a
                                    ></span>
                                    <span class="inline-flex"
                                        ><a
                                            :href="'/condtions/edit/' + item.id"
                                            class="inline-flex cursor-pointer text-70 hover:text-primary mr-3 has-tooltip"
                                            dusk="1-edit-button"
                                            data-original-title="null"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 20 20"
                                                aria-labelledby="edit"
                                                role="presentation"
                                                class="fill-current"
                                            >
                                                <path
                                                    d="M4.3 10.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H5a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM6 14h2.59l9-9L15 2.41l-9 9V14zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h6a1 1 0 1 1 0 2H2v14h14v-6z"
                                                ></path></svg></a
                                    ></span> -->
                                    <!-- <button
                                        data-testid="users-items-0-delete-button"
                                        dusk="1-delete-button"
                                        class="inline-flex appearance-none cursor-pointer text-70 hover:text-primary mr-3 has-tooltip"
                                        data-original-title="null"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                            aria-labelledby="delete"
                                            role="presentation"
                                            class="fill-current"
                                        >
                                            <path
                                                fill-rule="nonzero"
                                                d="M6 4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6H1a1 1 0 1 1 0-2h5zM4 6v12h12V6H4zm8-2V2H8v2h4zM8 8a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z"
                                            ></path>
                                        </svg>
                                    </button> -->
                                    <!---->
                                    <!---->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- </div> -->
</template>

<script>
export default {
    metaInfo() {
        return {
            title: "Plans"
        };
    },
    data() {
        return {
            name: "",
            value: "",
            type: "",
            target: "",
            description: "",
            more_data: "",
            errors: null,
            conditions: null
        };
    },
    mounted() {
        this.getConditions();
    },
    methods: {
        getConditions() {
            axios
                .get("/api/plans")
                .then(res => {
                    this.conditions = res.data;
                    console.log(res.data);
                })
                .catch(err => {
                    console.error(err);
                });
        }
    }
};
</script>

<style>
/* Scoped Styles */
</style>
