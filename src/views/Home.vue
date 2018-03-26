<template>
  <div class="home">
    <img src="../assets/logo.png">
    <HelloWorld msg=" Phalcon-vue Tasker"/>

		<p>
			<input placeholder="write a new task" v-model="task.name">
			<button @click="addTask">Save</button>
    </p>

		<ul>
			<li :key="task.id" v-for="task of tasks">
				<span v-if="!task.editMode">{{ task.name }} | {{ task.state }} </span>
				<input v-else v-model="task.name"/>
				<button @click="changeMode(task)"> {{ task.editMode ? 'Save' : 'Edit'}}</button>
				<button @click="deleteTask(task.id)">x</button>
			</li>
		</ul>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "@/components/HelloWorld.vue";
import axios from 'axios';

const Task = {
	name: '',
	state: 'todo'
}

export default {
  name: "home",
  components: {
    HelloWorld
	},
	data() {
		return {
			tasks: [],
			task: {...Task}
		}
	},

	mounted() {
		this.getTasks();
	},

	methods: {
		async getTasks() {
			const { data } = await axios.get('/task')
			data.map((task) => {
				task.editMode = false;
				return task;
			})
			this.tasks = data;
		},

		addTask() {
			const data = {...this.task}
			const form = new FormData();
			form.set('name', data.name)
			form.set('state', data.state)
			axios.post('/task/create', form)
				.then(({ data }) => {
					if (data.success) {
						this.getTasks();
						this.task = { ...Task}
					}
				})
				.catch(err => console.log(err))
		},

		deleteTask(id) {
			axios.delete(`/task/delete/${id}`)
				.then(() => this.getTasks());
		},

		changeMode(task) {
			if (task.editMode) {
				this.update(task)
			}
			task.editMode = !task.editMode
		},

		update(task) {
			const form = new FormData();
			form.set('id', task.id)
			form.set('name', task.name)
			form.set('state', task.state)
			axios.post(`/task/update/${task.id}`, form)
				.then(({ data }) => {
					if (data.success) {
						alert('updated');
					}
				})
				.catch(err => console.log(err))
			this.axios
		}
	},


};
</script>
