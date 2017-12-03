create table ingredient(
	id integer primary key AUTO_INCREMENT,
	name text not null
);

create table receipe(
	id integer primary key AUTO_INCREMENT,
	name text not null
);

create table ingredient_to_receipe(
	id_ingredient integer  REFERENCES ingredient(id),
	id_receipe integer REFERENCES receipe(id),
	quantity integer not null
);

create table product_category(
	id integer primary key auto_increment,
	name text not null
);

create table ingredient_to_category(
	id_category integer references product_category(id),
	id_ingredient integer references ingredient(id)
);