create table tasks (
	id int(11) unsigned not null auto_increment,
	name text,
	state ENUM('done', 'todo'),
	created TIMESTAMP not null,
	updated TIMESTAMP not null
)
