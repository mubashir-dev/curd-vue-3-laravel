import AllTasks from './components/AllTasks.vue';
import AddTask from './components/AddTask.vue';
import EditTask from './components/EditTask.vue';
import CompletedTask from './components/CompletedTask.vue';
import Login from './components/Login.vue';

export const routes = [
    {
        name: 'login',
        path: '/login',
        component: Login,
        alias:"/login"
    },
    {
        name: 'home',
        path: '/',
        component: AllTasks,
        alias:"/home"
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
