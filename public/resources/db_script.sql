create database if not exists coffee_db;
use coffee_db;

-- Customers
create table if not exists customers (
  customer_id int(5) not null auto_increment,
  customer_email varchar(50) not null unique,
  customer_password varchar(64) not null,
  customer_first_name varchar(30) not null,
  customer_last_name varchar(30) not null,
  customer_address1 varchar(100) not null,
  customer_address2 varchar(100) null,
  customer_suburb varchar(100) not null,
  customer_state char(3) not null,
  customer_postcode int(4) not null,
  customer_phone varchar(10) not null,
  primary key (customer_id)
);

-- Categories
create table if not exists categories (
  category_name varchar(30) not null,
  category_desc varchar(255) null,
  primary key (category_name)
);

-- Products
create table if not exists products (
  product_id int(5) not null auto_increment,
  product_name varchar(100) not null,
  product_desc longtext not null,
  product_weight_grams int(4) not null,
  product_cost decimal(5,2) not null,
  product_img varchar(100) not null,
  product_featured tinyint(1) null default null,
  product_category varchar(30) not null,
  primary key (product_id),
  foreign key (product_category) references categories(category_name)
);

-- Orders
create table if not exists orders (
  order_id int(5) not null auto_increment,
  order_date datetime not null,
  order_ship_date datetime null,
  order_status varchar(30) null,
  order_comment varchar(255) null,
  order_postage decimal(4, 2) not null,
  order_total decimal(5, 2) not null,
  customer_id int(5) not null,
  primary key(order_id),
  foreign key (customer_id) references customers(customer_id)
);

-- Order Details
create table if not exists order_details (
  order_id int(5) not null,
  product_id int(5) not null,
  product_quantity int(2) not null,
  primary key (order_id, product_id),
  foreign key (order_id) references orders(order_id),
  foreign key (product_id) references products(product_id)
);

-- Add categories
insert into categories (category_name, category_desc)
values
  ('Beans', 'Quality coffee bean blends'),
  ('Equipment', 'Coffee brewing equipment'),
  ('Accessories', 'Accessories for enjoying your coffee');

-- Add products
insert into products (product_name, product_desc, product_weight_grams, product_cost, product_img, product_featured, product_category)
values
  ('Blue Mountain Beans', 'Grown in the Blue Mountains of Jamaica, this blend of three different beans is mild, with only the slightest hint of bitterness. 500g.', 550, 12.00, 'blue-mountain.jpg', 0, 'Beans'),
  ('Colombia Beans', 'A medium roast with a mild, fruity flavour, and a hint of citric acidity. 500g.', 550, 12.00, 'colombia.jpg', 1, 'Beans'),
  ('Crema Beans', 'This well-rounded, medium roast blend is perfect for milk coffees, yet sweet enough to have alone. 500g.', 550, 12.00, 'crema.jpg', 0, 'Beans'),
  ('Digital Scale', 'Digital kitchen scale for weighing the perfect amount of coffee. Measures in grams, kilograms, ounces and pounds. Maximum 1kg capactity.', 615, 20.00, 'digital-scale.jpg', 0, 'Equipment'),
  ('Espresso Beans', 'Italian-style blend of light to medium roast beans with a chocolatey undertone. 500g.', 550, 12.00, 'espresso.jpg', 1, 'Beans'),
  ('Ethiopia Beans', 'Full-bodied, medium roast bean blend grown in Ethiopia, with notes of cinnamon and blueberry. 500g.', 550, 12.00, 'ethiopia.jpg', 0, 'Beans'),
  ('French Press Coffee Maker', 'Tempered glass French press. Makes 4 cups or 950ml coffee.', 550, 20.00, 'french-press.jpg', 0, 'Equipment'),
  ('Freshly Brewed Enamel Mug', 'White enamel mug with a vintage "Freshly Brewed Coffee - The Perfect Blend" logo. 350ml capacity.', 160, 10.00, 'freshly-brewed-mug.jpg', 1, 'Accessories'),
  ('Guatemala Beans', 'A blend of the first beans from Guatemala, this produces a rich, full-bodied flavour. 500g.', 550, 12.00, 'guatemala.jpg', 0, 'Beans'),
  ('Glass Keep Cup', 'Tempered glass, reusable takeaway cup. With a cork grip and black, BPA free plastic lid. 350ml capacity.', 360, 15.00, 'keep-cup.jpg', 1, 'Accessories'),
  ('Glass Mug', 'Tall, curved glass mug for serving iced coffees and frappes. 450ml capacity.', 550, 13.00, 'glass-mug.jpg', 0, 'Accessories'),
  ('Glass Serving Jug', 'Vintage style, wide bottomed glass jug. Perfect for serving milk or iced and cold-brew coffee. 1 litre capacity.', 1100, 18.00, 'glass-jug.jpg', 0, 'Accessories'),
  ('Never Settle Enamel Mug', 'Black enamel mug with all over speckle pattern and ‘Never Settle’ print. 350ml capacity.', 160, 10.00, 'never-settle-mug.jpg', 0, 'Accessories'),
  ('Paper Coffee Filters - Large', '60 pack of size 02 coffee filters. For up to 4 cups.', 50, 5.00, 'filter-large.jpg', 0, 'Equipment'),
  ('Paper Coffee Filters - Small', '100 pack of size 04 coffee filters. For up to 2 cups.', 50, 5.00, 'filter-small.jpg', 0, 'Equipment'),
  ('Pour Over Coffee Maker', 'Tempered glass flask for making pour over coffee. Features a wooden handle for easy serving. Makes 4 cups or 1 litre coffee.', 820, 27.00, 'pour-over-flask.jpg', 1, 'Equipment'),
  ('Pour Over Coffee Set', 'Ceramic pour over coffee maker with handle. Paired with a tempered glass, handle-free cup with a cork grip. 300ml capacity.', 850, 30.00, 'pour-over-set.jpg', 0, 'Equipment'),
  ('Stovetop Espresso Maker', 'Stainless steel espresso maker for the stovetop. Makes 6 cups of espresso style coffee. 350ml capacity.', 760, 25.00, 'espresso-maker.jpg', 1, 'Equipment'),
  ('Whistling Stovetop Kettle', 'Stainless steel stovetop kettle. Features a gooseneck spout for pouring precision, temperature gauge and whistles when boiled. 1.2 litre capacity.', 900, 23.00, 'kettle.jpg', 0, 'Equipment');

-- sample customer data
insert into customers (customer_id, customer_email, customer_password, customer_first_name, customer_last_name, customer_address1, customer_suburb, customer_state, customer_postcode, customer_phone)
values (1, 'test-personal@damnfinecoffee.com', '$2y$10$rYqxe8FxrbWmkg49eYqpn.zjeZJTHbNOTLvAt9IgvN8WE7fCDwBSq', 'Bob', 'Newbie', '123 Some Street', 'Adelaide', 'SA', 5112, '0411222333');

-- sample order data
insert into orders (order_id, order_date, order_status, order_postage, order_total, customer_id)
values (1, '2020-06-01', 'received', 8.95, 52.95, 1);

insert into order_details(order_id, product_id, product_quantity)
values (1, 1, 2), (1, 4, 1);