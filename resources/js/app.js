require('./bootstrap');

import Vue from 'vue';
import Buefy from "buefy";
Vue.use(Buefy)
export const EventBus = new Vue();


import Flash from "./components/Flash";
import Task from "./components/tasks/Task";
import Tasks from "./components/tasks/Tasks";
import TaskForm from "./components/tasks/TaskForm";
import TypeActivitiesList from "./components/TypeActivitiesList";
import DataTable from "./components/DataTable";
import GeneralForm from "./components/GeneralForm";
import Spending from './components/Spending';

Vue.component('task', Task);
Vue.component('tasks', Tasks);
Vue.component('flash', Flash);
Vue.component('spending', Spending);
Vue.component('task-form', TaskForm);
Vue.component('type-activities-list', TypeActivitiesList);
Vue.component('data-table', DataTable);
Vue.component('general-form', GeneralForm);




const app = new Vue({
    el: '#app'
});
