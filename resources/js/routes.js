import AllTasks from './components/AllTasks.vue';
import AddTask from './components/AddTask.vue';
import EditTask from './components/EditTask.vue';
import CompletedTask from './components/CompletedTask.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllTasks
    },
    {
        name: 'completed',
        path: '/completed',
        component: CompletedTask
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
