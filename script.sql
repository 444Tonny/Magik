CREATE TABLE magik_codes (
    id_code INT AUTO_INCREMENT PRIMARY KEY,
    value VARCHAR(10) NOT NULL,
    points INT NOT NULL
);
ALTER TABLE magik_codes
ADD COLUMN is_used INT,
ADD COLUMN id_user_redeem INT REFERENCES users(id_user),
ADD COLUMN date_redeem DATETIME;

CREATE TABLE colors ( INT PRIMARY KEY AUTO_INCREMENT,
    name_color VARCHAR(255) NOT NULL,
    hex VARCHAR(30) NOT NULL
);

CREATE TABLE categories (
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    name_category VARCHAR(255) NOT NULL
);


CREATE TABLE products (
    id_product INT PRIMARY KEY AUTO_INCREMENT,
    name_product VARCHAR(255) NOT NULL,
    description TEXT,
    price INT NOT NULL,
    stock INT NOT NULL,
    image_large TEXT,
    image_small TEXT,
    id_category INT, INT,
    color_product VARCHAR(50),
    FOREIGN KEY (id_category) REFERENCES categories(id_category)
) AUTO_INCREMENT = 100;

-- Créez la nouvelle table avec id commencant par 6000
CREATE TABLE users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE,
    points INT DEFAULT 0
);
ALTER TABLE users AUTO_INCREMENT = 6000;

CREATE TABLE orders (
    id_orders INT PRIMARY KEY AUTO_INCREMENT,
    status_order VARCHAR(30),
    date_orders DATETIME,
    name_order VARCHAR(255),
    username_order VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(255),
    email VARCHAR(255),
    id_user VARCHAR(150) REFERENCES users(id_user),
    color VARCHAR(20)
);
ALTER TABLE orders AUTO_INCREMENT = 1;
ALTER TABLE orders
ADD COLUMN id_product INT,
ADD FOREIGN KEY (id_product) REFERENCES products(id_product);


CREATE TABLE magik_users (
    id VARCHAR(150) NOT NULL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) DEFAULT NULL,
    role VARCHAR(255) DEFAULT 'user',
    email VARCHAR(255),
    points INT DEFAULT 0
);

ALTER TABLE magik_users
ADD COLUMN google_id VARCHAR(255) DEFAULT NULL;



/* Data */

INSERT INTO users (email, points) VALUES('tester.magik@gmail.com', 1500000);


INSERT INTO categories (name_category) VALUES ('Accesorios');
INSERT INTO categories (name_category) VALUES ('Consolas');
INSERT INTO categories (name_category) VALUES ('PC Gaming');
INSERT INTO categories (name_category) VALUES ('Sillas Gaming');
INSERT INTO categories (name_category) VALUES ('Experiencias');


INSERT INTO colors (name_color, hex) VALUES ('Morado', '#C600FF');
INSERT INTO colors (name_color, hex) VALUES ('Verde', '#28DC14');
INSERT INTO colors (name_color, hex) VALUES ('Rojo', '#E33A3A');
INSERT INTO colors (name_color, hex) VALUES ('Negro', '#151515');
INSERT INTO colors (name_color, hex) VALUES ('Blanco', '#FFFFFF');
INSERT INTO colors (name_color, hex) VALUES ('Rosa', '#FF8FBF');

INSERT INTO products (name_product, description, price, stock, image_large, 
image_small, id_category, color_product)
VALUES ('Vlog 1 día con Magik', 'Pasa un día entero con Magik grabando un vlog para su canal de Youtube. Disfruta de todo tipo de actividades durante 24 horas. Incluye alojamiento y billetes de vuelo para acompañante.'
, 3000000, 1, 'img/products/vlog_large.png',
'img/products/vlog_small.png', 5, null);

INSERT INTO products (name_product, description, price, stock, image_large, 
image_small, id_category, color_product)
VALUES ('Cascos Gaming', 'Nuestros Cascos Gaming son la elección perfecta para aquellos que buscan una experiencia de juego inmersiva y de alta calidad. Con un diseño cómodo y ajustable, estos auriculares son ideales para largas sesiones de juego. Además, su tecnología de cancelación de ruido te permitirá disfrutar de tu música favorita mientras juegas a Fortnite sin distracciones. ¡Experimenta el sonido envolvente de tus juegos como nunca antes con nuestros Cascos Gaming'
, 300000, 2, 'img/products/cascos_large.png',
'img/products/cascos_small.png', 1, null);


INSERT INTO products (name_product, description, price, stock, image_large, 
image_small, id_category, color_product)
VALUES ('Ratón Gaming', 'El RATÓN GAMING es el complemento perfecto para los amantes de Fortnite. Su diseño ergonómico y su precisión te permitirán disfrutar de una experiencia de juego única y fluida. Además, su sistema de iluminación LED le dará un toque de estilo a tu setup gaming. No lo pienses más y adquiere este RATÓN GAMING para llevar tus habilidades en Fortnite al siguiente nivel.'
, 350000, 3, 'img/products/raton_large.png',
'img/products/raton_small.png', 1, null);

INSERT INTO products (name_product, description, price, stock, image_large, 
image_small, id_category, color_product)
VALUES ('Teclado Gaming', 'El TECLADO GAMING es el compañero perfecto para los gamers de Fortnite. Con una velocidad de respuesta ultra rápida y teclas mecánicas, este teclado te permitirá reaccionar en tiempo real y ganar ventaja en el juego. Además, cuenta con retroiluminación RGB y una construcción duradera y resistente. Con un diseño ergonómico y cómodo, este teclado es la elección ideal para aquéllos que buscan una experiencia de juego mejorada. ¡Asegura tu victoria en Fortnite con este TECLADO GAMING'
, 350000, 2, 'img/products/teclado_large.png',
'img/products/teclado_small.png', 1, null);

INSERT INTO products (name_product, description, price, stock, image_large, 
image_small, id_category, color_product)
VALUES ('PC Gaming', 'Presentamos nuestra PC para juegos de alta gama, el arma definitiva para los entusiastas de los juegos. Diseñada para satisfacer las demandas de los jugadores más exigentes, esta PC tiene todo lo que necesitas para enfrentarte a la competencia. '
, 1000000, 2, 'img/products/pc_large.png',
'img/products/pc_small.png', 3, '400;500');

INSERT INTO products (name_product, description, price, stock, image_large, 
image_small, id_category, color_product)
VALUES ('Silla Gaming', 'La Silla Gaming es una opción ideal para quienes buscan comodidad y versatilidad mientras disfrutan de sus juegos favoritos. Diseñada con una estética gamer, se adapta perfectamente a cualquier decoración de habitación u oficina. Con materiales de alta calidad y un diseño ergonómico, esta silla permite largas horas de juego sin fatiga o dolor en la espalda. Además, su estructura resistente garantiza una durabilidad a largo plazo. ¡Haz de tus sesiones de juego una experiencia más cómoda y emocionante con la Silla Gaming'
, 600000, 3, 'img/products/silla_large.png',
'img/products/silla_small.png', 4, '100;200;300;400;500;600');

INSERT INTO products (name_product, description, price, stock, image_large, 
image_small, id_category, color_product)
VALUES ('PS5', 'La consonla de nueva generación por excelencia. Compatible con juegos exclusivos y lista para ser entregada.'
, 700000, 5, 'img/products/ps5_large.png',
'img/products/ps5_small.png', 2, null);