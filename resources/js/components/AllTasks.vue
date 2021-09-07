<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Todo's List</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Todo</th>
                  <th scope="col">Description</th>
                  <th scope="col">Priority</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="todo in todos" :key="todo.id">
                  <td>{{ todo.id }}</td>
                  <td>
                    <span class="text-primary font-weight-bold">{{
                      todo.title.toUpperCase()
                    }}</span>
                  </td>
                  <td>{{ todo.description }}</td>
                  <td>
                    <span
                      v-if="todo.priority == 'high'"
                      class="badge badge-danger"
                      >{{ todo.priority.toUpperCase() }}</span
                    >
                    <span
                      v-if="todo.priority == 'low'"
                      class="badge badge-warning"
                      >{{ todo.priority.toUpperCase() }}</span
                    >
                  </td>
                  <td>{{ todo.start_date }}</td>
                  <td>{{ todo.end_date }}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <router-link
                        :to="{ name: 'edit', params: { id: todo.id } }"
                        class="btn btn-primary"
                        >Edit
                      </router-link>
                      <button class="btn btn-success">Complete</button>
                      <button
                        class="btn btn-danger"
                        @click="deleteTodo(todo.id)"
                      >
                        Delete
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      todos: [],
    };
  },
  created() {
    this.axios
      .get("api/todo")
      .then((response) => {
        this.todos = response.data;
        console.log(response);
      })
      .catch((error) => console.log(error))
      .finally(() => (this.loading = false));
  },
  methods: {
    deleteTodo(id) {
      let confirm_flag = confirm("Are You sure to delete this record");
      if (confirm_flag) {
        this.axios.delete(`api/todo/${id}`).then((response) => {
          let i = this.todos.map((data) => data.id).indexOf(id);
          this.todos.splice(i, 1);
        });
      }
    },
  },
};
</script>
