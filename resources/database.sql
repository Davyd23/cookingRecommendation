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