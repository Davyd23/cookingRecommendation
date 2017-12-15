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





INSERT INTO `ingredient_to_category`(`id_category`, `id_ingredient`) VALUES (1,1), (1, 3);
INSERT INTO `ingredient_to_category`(`id_category`, `id_ingredient`) VALUES
 (3,6), (3, 7), (3,8), (3,9), (3,10),
 (4,11), (4, 12), (4, 13), (4,14), (4,15),
 (5,16), (5, 17), (5,18), (5,19),
 (6,20), (6, 21), (6,22), (6,23), (6,24),
 (7,25), (7, 26), (7,27), (7,28), (7,29),
 (8,30), (8, 31), (8,32),
 (9,33), (9, 34), (9,35), (9,36), (9,37),
 (10,38), (10, 39), (10,40), (10,41), (10,42),
 (11,43), (11, 44), (11,45),
 (12,46), (12,47);
INSERT INTO `ingredient_to_category`(`id_category`, `id_ingredient`) VALUES (1,1), (1, 3), (1,4);

INSERT INTO `receipe`(`name`) VALUES ("sala de fructe");

INSERT INTO `receipe`(`name`) VALUES ("sala de fructe cu mango");

INSERT INTO `ingredient_to_receipe`(`id_receipe`, `id_ingredient`, `quantity`) VALUES (1,1, 1), (1, 3, 1);

INSERT INTO `ingredient_to_receipe`(`id_receipe`, `id_ingredient`, `quantity`) VALUES (3,1, 1), (3, 3, 1), (3, 4, 1);