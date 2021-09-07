import AllTasks from './components/AllTasks.vue';
import AddTask from './components/AddTask.vue';
import EditTask from './components/EditTask.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllTasks
    },
    {
        name: 'add',
        path: '/add',
        component: AddTask
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditTask
    }
];
