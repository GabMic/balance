<template>
    <section>
        <h5 class="title is-5" >{{translations.title}}</h5>
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
                    {{translations.amount}} {{ collapse.amount }} {{translations.currency}}
                </p>
                <a class="card-header-icon">
                    <b-icon
                        :icon="props.open ? 'mdi mdi-menu-up-outline' : 'mdi mdi-menu-down-outline'">
                    </b-icon>
                </a>
            </div>
            <div class="card-content">
                <div class="content">
                    {{translations.info}} {{ collapse.info }}
                    <hr>
                    {{translations.confirmation}} {{collapse.confirmation}}
                    <hr>
                    {{translations.bill_number}} {{collapse.bill_id}}
                    <hr>
                    {{translations.paid_at}} {{collapse.paid_at}}
                    <hr>
                    <a :href="`/activities/${collapse.id}`">{{translations.show_activity}}</a>
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
                translations: window.balance.paymentsListTranslations,

            }
        },

        mounted() {
            this.collapses = window.balance.typeActivitiesList
        }
    }
</script>
