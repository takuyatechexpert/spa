<template>
  <div class="container">
    <table class="table table-hover">
      <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Person In Charge</th>
        <th scope="col">Show</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="task in tasks">
        <th scope="row">{{task.id}}</th>
        <td>{{task.title}}</td>
        <td>{{task.content}}</td>
        <td>{{task.person_in_charge}}</td>
        <td>
          <router-link :to="{name: 'task.show',params: {taskId: String(task.id)}}">
          <!-- js構文で元々数値型のtask.idを文字列型に変換している
          これをしないと遷移先の詳細ページに数値型として送られるが
          詳細ページでリロードするとなぜか文字列型に変わる
          その為最初から文字列として送る為に文字列変換している -->
            <button class="btn btn-primary">Show</button>
          </router-link>
        </td>
        <td>
          <router-link :to="{name: 'task.edit',params: {taskId: String(task.id)}}">
            <button class="btn btn-success">Edit</button>
          </router-link>
        </td>
        <td>
          <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    data: function(){
      return {
        tasks:[]
      }
    },

    methods: {
      getTasks(){
        axios.get('/api/tasks')
          .then((res)=> {
            this.tasks = res.data;
          });
      },

      // deketeには削除したいidを渡す
      deleteTask(id){
        axios.delete('/api/tasks/' + id)
          .then((res) => {
            this.getTasks();
            // deleteした結果を再表示する為にgetTasksのメソッドを叩いている
          })
      }
    },

    mounted(){
      this.getTasks();
    }
  }
</script>
