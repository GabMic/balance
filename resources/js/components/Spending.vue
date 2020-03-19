<template>
    <div class="level-item">
        <div class="is-widget-label">
            <h5 class="subtitle is-5 is-spaced" v-text="text.title"></h5>
            <button class="button is-large is-info is-loading is-outlined" style="border-color: transparent;" v-if="loading"></button>
            <h1 class="title is-1-mobile" v-text="amount + text.currency"></h1>
            <hr style="margin: 0.3rem">
            <a href="/activity/today">{{text.viewTodayActivities}}</a>
        </div>
    </div>
</template>

<script>
    export default {

        mounted() {
            const d = new Date();
            const day = d.getDate()
            axios.get('/activities', {
                params: {
                    day: day
                }
            }).then(({data}) => {
                this.amount = new Intl.NumberFormat().format(data)
                this.loading = false
            })
        },

        data(){
            return {
                text: {
                    title: balance.dailySpending,
                    currency: balance.currency,
                    viewTodayActivities: balance.todayActivities
                },
                loading: true,
                amount: null
            }

        }

    }
</script>
