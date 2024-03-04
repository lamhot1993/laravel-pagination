<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
<div class="navbar">
        <div class="navbar-start">
            <a class="navbar-item">Ripple UI</a>
        </div>
        <div class="navbar-end">
            <a class="navbar-item">Home</a>
            <a class="navbar-item">About</a>
            <a class="navbar-item">Contact</a>
        </div>
    </div>
    <br>
    <div id="app">   
    <div class="flex w-full overflow-x-auto">
    
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Age</th>
                    <th>Birthday</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(users,i) in data">
                    <th>{{users.id}}</th>
                    <td>{{users.name}}</td>
                    <td>{{users.email}}</td>
                    <td>{{users.address}}</td>
                    <td>{{users.age}}</td>
                    <td>{{users.birthday}}</td>
                </tr>
            </tbody>
        </table>
    </div>
<div class="btn-group btn-group-scrollable">
   <div v-for="(data_button,i) in buttons" >
   <button class="btn btn-solid-primary" @click="loadPagination(i++)">{{i=i+1}}</button>
   </div>
</div>

</div>
<script src="https://cdn.tailwindcss.com"></script>

<script>
  const { createApp } = Vue

  createApp({
    data() {
      return {
         data : [],
         buttons:[]
      }
    },
    methods: {
        loadPagination: async function(number){
            const response = await fetch("/users?page="+number);
            const data = await response.json();
        
            this.data = data.data;
            this.buttons = data.per_page;
        },
        loadApp : async function(){
            const response = await fetch("/users");
            const data = await response.json();
        
            this.data = data.data;
            this.buttons = data.per_page;
        }
    },
    mounted() {
        this.loadApp();
    },
  }).mount('#app')
</script>
</body>
</html>