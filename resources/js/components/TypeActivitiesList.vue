<template>
    <section>
        <h5 class="title is-5" v-text="paymentsList"></h5>
        <b-collapse
            class="card"
            v-for="(collapse, index) of collapses"
            :key="index"
            :open="isOpen === index"
            @open="isOpen = index">
            <div
                slot="trigger"
                slot-scope="props"
                class="card-header"
                role="button">
                <p class="card-header-title">
                    סכום: {{ collapse.amount }} ש"ח
                </p>
                <a class="card-header-icon">
                    <b-icon
                        :icon="props.open ? 'mdi mdi-menu-up-outline' : 'mdi mdi-menu-down-outline'">
                    </b-icon>
                </a>
            </div>
            <div class="card-content">
                <div class="content">
                    מידע נוסף: {{ collapse.info }}
                    <hr>
                    מספר אישור תשלום: {{collapse.confirmation}}
                    <hr>
                    עבור חשבונית מספר: {{collapse.bill_id}}
                    <hr>
                    שולם בתאריך: {{collapse.paid_at}}
                </div>
            </div>
        </b-collapse>

    </section>
</template>

<script>
    export default {
        data() {
            return {
                isOpen: 0,
                collapses: [],
                paymentsList: window.balance.paymentsListString
            }
        },

        mounted() {
            this.collapses = window.balance.typeActivitiesList
        }
    }
</script>
