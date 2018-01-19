INSERT INTO `product_category`(`name`) VALUES ("fruits");
INSERT INTO `product_category`(`name`) VALUES ("vegetables");
INSERT INTO `product_category`(`name`) VALUES ("spices");
INSERT INTO `product_category`(`name`) VALUES ("meats");
INSERT INTO `product_category`(`name`) VALUES ("fish");
INSERT INTO `product_category`(`name`) VALUES ("seafood");
INSERT INTO `product_category`(`name`) VALUES ("condiments");
INSERT INTO `product_category`(`name`) VALUES ("oils");
INSERT INTO `product_category`(`name`) VALUES ("alcohol");
INSERT INTO `product_category`(`name`) VALUES ("beverages");
INSERT INTO `product_category`(`name`) VALUES ("sauces");
INSERT INTO `product_category`(`name`) VALUES ("legumes");


INSERT INTO `ingredient`( `name`) VALUES ("apple"), ("mango");
INSERT INTO `ingredient`( `name`) VALUES ("vanilla"), ("cinnamon"),("chili powder"),("oregano"),("paprika"), ("beef steak"), ("bacon"),("sausage"),("turkey"),("lamb"), ("salmon"), ("swordfish"),("cod"),("tuna steak"), ("oyster"), ("crab"),("lobster"),("octopus"),("shrimp"), ("cider vinegar"), ("fish sauce"),("mayonnaise"),("ketchup"),("mustard"),("vegetable oil"),("olive oil"),("peanut oil"), ("red wine"), ("whisky"),("brown beer"),("vodka"),("bourbon"), ("lemonade"), ("coffee"),("tea"),("coke"),("green tea"), ("curry paste"),("tomato sauce"),("pesto"), ("soybeans"), ("hummus");


delimiter //
CREATE PROCEDURE tie_ingredient_to_category (product_category char(50), ingredient char(50))
BEGIN

   insert into `ingredient_to_category`(`id_ingredient`,`id_category`) values (
		(Select `id` from `ingredient` where `name` = ingredient ) ,
		(Select `id` from `product_category` where `name` = product_category )
	);
END//
delimiter ;

call tie_ingredient_to_category("fruits", "apple");
call tie_ingredient_to_category("fruits", "mango");
call tie_ingredient_to_category("spices", "vanilla");
call tie_ingredient_to_category("spices", "cinnamon");
call tie_ingredient_to_category("spices", "chili powder");
call tie_ingredient_to_category("spices", "oregano");
call tie_ingredient_to_category("spices", "paprika");
call tie_ingredient_to_category("meats", "beef steak");
call tie_ingredient_to_category("meats", "bacon");
call tie_ingredient_to_category("meats", "sausage");
call tie_ingredient_to_category("meats", "turkey");
call tie_ingredient_to_category("meats", "lamb");
call tie_ingredient_to_category("fish", "salmon");
call tie_ingredient_to_category("fish", "swordfish");
call tie_ingredient_to_category("fish", "cod");
call tie_ingredient_to_category("fish", "tuna steak");
call tie_ingredient_to_category("seafood", "oyster");
call tie_ingredient_to_category("seafood", "crab");
call tie_ingredient_to_category("seafood", "lobster");
call tie_ingredient_to_category("seafood", "octopus");
call tie_ingredient_to_category("seafood", "shrimp");
call tie_ingredient_to_category("spices", "cider vinegar");
call tie_ingredient_to_category("sauces", "fish sauce");
call tie_ingredient_to_category("sauces", "mayonnaise");
call tie_ingredient_to_category("sauces", "ketchup");
call tie_ingredient_to_category("sauces", "mustard");
call tie_ingredient_to_category("oils", "vegetable oil");
call tie_ingredient_to_category("oils", "olive oil");
call tie_ingredient_to_category("oils", "peanut oil");
call tie_ingredient_to_category("alcohol", "red wine");
call tie_ingredient_to_category("alcohol", "whisky");
call tie_ingredient_to_category("alcohol", "brown beer");
call tie_ingredient_to_category("alcohol", "vodka");
call tie_ingredient_to_category("alcohol", "bourbon");
call tie_ingredient_to_category("beverages", "lemonade");
call tie_ingredient_to_category("beverages", "coffee");
call tie_ingredient_to_category("beverages", "tea");
call tie_ingredient_to_category("beverages", "coke");
call tie_ingredient_to_category("beverages", "green tea");
call tie_ingredient_to_category("sauces", "curry paste");
call tie_ingredient_to_category("sauces", "tomato sauce");
call tie_ingredient_to_category("sauces", "pesto");
call tie_ingredient_to_category("legumes", "soybeans");
call tie_ingredient_to_category("legumes", "hummus");