create table users (
	id int(11) unsigned not null AUTO_INCREMENT,
	name varchar(70) not null,
	email varchar(70) not null,
	constraint pk_user_id primary key(id)
);
