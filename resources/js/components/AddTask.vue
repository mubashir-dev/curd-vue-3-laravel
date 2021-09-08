
<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Add Todo's</div>
          <div class="card-body">
           <form @submit.prevent="addTodo">
                <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" v-model="todos.title"/>
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
                  <input type="date" class="form-control" v-model="todos.start_date"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>End Date</label>
                  <input type="date" class="form-control" v-model="todos.end_date"/>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                <label>Description</label>
               <textarea cols="30" rows="10" placeholder="Todo Description" class="form-control" v-model="todos.description"></textarea>
              </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary float-right">
Add Todo
                    </button>
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
    console.log("Add todo Component mounted.");
  },
  created() {
          console.log(this.router);
  },
  data() {
    return {
      todos: {
          priority:'high'
      },
      errors:[]
    };
  },
  methods: {
    addTodo() {
      this.axios
        .post("api/todo", this.todos)
        .then((response) => {
            console.log(response);
          if (response.status === 201) {
            //   console.log(this.$router);
              this.$router.push('/');
              }
        })
        .catch((error) => {
            this.errors = error;
            console.log(this.errors);
        })
        .finally(() => (this.loading = false));
    },
  },
};
</script>
