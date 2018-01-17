create table ingredient(
	id integer primary key AUTO_INCREMENT,
	name text not null
);

create table receipe(
	id integer primary key AUTO_INCREMENT,
	name text not null,
	external_id integer not null
);

create table product_category(
	id integer primary key auto_increment,
	name text not null
);

create table ingredient_to_category(
	id_category integer references product_category(id),
	id_ingredient integer references ingredient(id)
);

create table users(
	id integer primary key AUTO_INCREMENT,
	email text not null,
	password text not null
);

create table user_to_receipe(
	id_user integer references users(id),
	id_receipe integer references receipe(id)
);