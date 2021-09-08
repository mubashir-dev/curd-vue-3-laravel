<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Edit Todo's [{{ todos.title }}]</div>
          <div class="card-body">
            <form @submit.prevent="editTodo">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="todos.title"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Priority</label>
                    <select class="form-control" v-model="todos.priority">
                      <option value="high">High</option>
                      <option value="low">Low</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start Date</label>
                    <input
                      type="date"
                      class="form-control"
                      v-model="todos.start_date"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End Date</label>
                    <input
                      type="date"
                      class="form-control"
                      v-model="todos.end_date"
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea
                      cols="30"
                      rows="10"
                      placeholder="Todo Description"
                      class="form-control"
                      v-model="todos.description"
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary float-right">Edit Todo</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      todos: {},
    };
  },
  created() {
    this.axios
      .get(`api/todo/${this.$route.params.id}`, this.todos)
      .then((response) => {
        if (response.status === 200) {
          //reload todos
          this.todos = response.data;
          console.log(response.data);
        }
      })
      .catch((error) => console.log(error))
      .finally(() => (this.loading = false));
  },
  methods: {
    editTodo() {
      this.axios
        .patch(`api/todo/${this.$route.params.id}`,this.todos)
        .then((response) => {
          if (response.status === 200) {
            //reload todos
              this.$router.push('/');
          }
        })
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
