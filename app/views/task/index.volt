{{ content() }}
<h1> Tasks </h1>

{% for $task in $tasks
	<li class="{{task.id}}"> $task.name</li>
%}
