<template>
    <div>
        <heading class="mb-6">Plan s</heading>
        <div class="flex" style="">
            <div
                class="relative h-9 flex-no-shrink mb-6"
                data-children-count="1"
            ></div>
            <div class="w-full flex items-center mb-6">
                <div class="flex w-full justify-end items-center mx-3"></div>
                <div class="flex-no-shrink ml-auto">
                    <a class="btn btn-default btn-primary" dusk="create-button">
                        Create Plan
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div
                v-if="errors"
                class="bg-red-500 text-dark py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg"
            >
                <div v-for="(v, k) in errors" :key="k">
                    <p
                        v-for="error in v"
                        :key="error"
                        class="text-sm text-danger"
                    >
                        {{ error }}
                    </p>
                </div>
            </div>
            <div></div>

            <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                    <label
                        for="name"
                        class="inline-block text-80 pt-2 leading-tight"
                    >
                        Name&nbsp;</label
                    >
                </div>
                <div class="py-6 px-8 w-1/2">
                    <input
                        id="name"
                        v-model="name"
                        name="name"
                        type="text"
                        value=""
                        placeholder="Name"
                        class="w-full form-control form-input form-input-bordered"
                    />
                </div>
            </div>
            <!-- end of name area -->

                <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                    <label
                        for="name"
                        class="inline-block text-80 pt-2 leading-tight"
                    >
                        Amount&nbsp;</label
                    >
                </div>
                <div class="py-6 px-8 w-1/2">
                    <input
                        id="amount"
                        v-model="amount"
                        name="amount"
                        type="number"
                        value=""
                        placeholder="Amount"
                        class="w-full form-control form-input form-input-bordered"
                    />
                </div>
            </div>
            <!-- end of name area -->

            <!-- type area -->
            <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                    <label
                        for="type"
                        class="inline-block text-80 pt-2 leading-tight"
                    >
                       Interval Type&nbsp;</label
                    >
                </div>

                <div class="py-6 px-8 w-1/2">
                    <select
                        id="type"
                        name="interval"
                        v-model="interval"
                        type="text"
                        placeholder="Type"
                        class="w-full form-control form-input form-input-bordered"
                    >
                        <option value="">Choose an option</option>
                        <option value="annually">annually</option>
                        <option value="biannually">biannually</option>
                        <option value="monthly">monthly</option>
                         <option value="weekly">weekly</option>
                        <option value="daily">daily</option>
                    </select>
                    <!---->
                    <!---->
                    <!---->
                </div>
            </div>
            <!-- end of type area -->

             <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                    <label
                        for="name"
                        class="inline-block text-80 pt-2 leading-tight"
                    >
                    Descriptiom&nbsp;</label
                    >
                </div>
                <div class="py-6 px-8 w-1/2">
                    <textarea
                        id="name"
                        v-model="description"
                        name="description"
                        type="text-area"
                        value=""
                        placeholder="Descriptiom"
                        class="w-full form-control form-input form-input-bordered"
                    />
                </div>
            </div>
            <!-- end of name area -->

            <!--  end of description area -->
            <div class="flex items-center py-6 mr-5">
                <a
                    tabindex="0"
                    class="btn btn-link dim cursor-pointer text-80 ml-auto mr-6"
                >
                </a>
                <button
                    type="submit"
                    @click="addPlan"
                    class="btn btn-default btn-primary inline-flex items-center relative"
                    dusk="create-button"
                >
                    <span class="">
                        Create Plans
                    </span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert";

export default {
    metaInfo() {
        return {
            title: "Plan"
        };
    },
    data() {
        return {
            name: "",
            amount: "",
            description: "",
            interval: ""
        };
    },
    mounted() {
    },
    methods: {
        addPlan() {
            // alert(this.productId);
   
            axios
                .post("/api/create-plan", {
                    name: this.name,
                    amount: this.amount,
                    description: this.amount,
                    interval: this.interval
                    
                },{})
                .then(res => {
                    swal(
                        "New Condition",
                        "New Condition created successfully",
                        "success"
                    );
                    // window.location.href = "/admin";
                    // console.log(res.data);
                })
                .catch(err => {
                    console.error(err);
                    swal(
                        "Error",
                        "There was an error submitting the form",
                        "error"
                    );
                    this.errors = err.response.data.errors;
                });
        },
      
      
    }
};
</script>

<style>
/* Scoped Styles */
</style>
