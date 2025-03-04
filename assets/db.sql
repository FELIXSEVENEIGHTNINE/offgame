-------------------------------------------
-- USERS
-------------------------------------------
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    user_id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(500) NOT NULL,
    email VARCHAR(150) DEFAULT NULL,
    banner_name VARCHAR(500) DEFAULT NULL,
    profile_picture_name VARCHAR(500) DEFAULT NULL
);

INSERT INTO users VALUES (1, "jeb12", "jebjebjeb", "jeb12@gmail.com", "", "");

-------------------------------------------
-- ADMINS
-------------------------------------------
DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    admin_id VARCHAR(12) PRIMARY KEY,
    admin_username VARCHAR(255) NOT NULL,
    admin_num VARCHAR(12) NOT NULL,
    admin_password VARCHAR(500) NOT NULL,
    user_id INT(12) UNSIGNED
);

ALTER TABLE admin ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(user_id);

INSERT INTO admin VALUES (1, "admin", "123456789123", "test", 1);

-------------------------------------------
-- BLOG 
-------------------------------------------
DROP TABLE blog;

CREATE TABLE blog (
    blog_id INT(8) AUTO_INCREMENT PRIMARY KEY,
    blog_date VARCHAR(500) DEFAULT NULL,
    blog_title VARCHAR(500) DEFAULT NULL,
    blog_text VARCHAR(500) DEFAULT NULL
);

INSERT INTO blog VALUES (1, "January 1, 2022", "Welcome", "hi");
INSERT INTO blog VALUES (2, "January 2, 2023", "Welcome 2", "hi2");
INSERT INTO blog VALUES (3, "January 3, 2023", "Welcome 3", "hi3");

-------------------------------------------
-- CREDIT
-------------------------------------------
DROP TABLE credit;

CREATE TABLE credit (
    credit_id INT(12) AUTO_INCREMENT PRIMARY KEY,
    amount INT(24) DEFAULT NULL,
    card_number VARCHAR(255) DEFAULT NULL,

    user_id INT(12) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO developers VALUES (1, "1200", "", 1);

-------------------------------------------
-- CART
-------------------------------------------
CREATE TABLE cart (
    cart_id INT(12) PRIMARY KEY,
    game_id INT(24),

    FOREIGN KEY (game_id) REFERENCES games(game_id),


);

-------------------------------------------
-- DEVELOPERS
-------------------------------------------
DROP TABLE developers;

CREATE TABLE developers (
    developer_id INT(12) AUTO_INCREMENT NOT NULL,
    developer_name VARCHAR(255) DEFAULT NULL,

    user_id INT(12) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO developers VALUES (1, "LocalThunk", );
INSERT INTO developers VALUES (2, "Scott Cawthon", );

-------------------------------------------
-- DEVELOPERS
-------------------------------------------
DROP TABLE developers;

CREATE TABLE developers (
    developer_id INT(12) AUTO_INCREMENT NOT NULL,
    developer_name VARCHAR(255) DEFAULT NULL,

    user_id INT(12) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO developers VALUES (1, "LocalThunk", );
INSERT INTO developers VALUES (2, "Scott Cawthon", );

-------------------------------------------
-- POST
-------------------------------------------
DROP TABLE post;

CREATE TABLE post(
    post_id INT(6) AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(255) DEFAULT NULL,
    post_content VARCHAR(10000) DEFAULT NULL,
    user_id INT(12),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
);

INSERT INTO post VALUES (1, "First post", "Hello", 1);

-------------------------------------------
-- GAMES 
-------------------------------------------
DROP TABLE games;

CREATE TABLE games (
    game_id INT(24) AUTO_INCREMENT NOT NULL,
    game_name VARCHAR(500) DEFAULT NULL,
    game_description TEXT DEFAULT NULL,
    game_logo VARCHAR(255) DEFAULT NULL,
    game_banner VARCHAR(255) DEFAULT NULL,
    game_photo VARCHAR(255) DEFAULT NULL,
    game_ad INT(1) DEFAULT NULL,
    ad_name VARCHAR(255) DEFAULT NULL,

    developer_id int(12),
    FOREIGN KEY (developer_id) REFERENCES developers(developer_id)
);

INSERT INTO games VALUES (1, "Balatro", "gambling", "", "balatro", "", 0, 1, "");
INSERT INTO games VALUES (2, "Five Nights at Freddy's", "scary", "", "fnaf", "", 0, 2, "fnaf");
INSERT INTO games VALUES (3, "Clash Royale", "broken", "", "clashroyale", "", 0, 2, "");


-------------------------------------------
-- GENRES
-------------------------------------------

DROP TABLE genres;

CREATE TABLE genres (
    genre_id INT(12) AUTO_INCREMENT NOT NULL,
    genre_name VARCHAR(255) DEFAULT NULL
);

INSERT INTO genres VALUES (1, "Action");
INSERT INTO genres VALUES (2, "Horror");



-------------------------------------------
-- GAME CATEGORY
-------------------------------------------
DROP TABLE game_category;

CREATE TABLE game_category (
    category_id INT(24) AUTO_INCREMENT NOT NULL,
    
    game_id INT(24),
    FOREIGN KEY (game_id) REFERENCES games(game_id),
    
    genre_id int(24),
    FOREIGN KEY (genre_id) REFERENCES genres(genre_id)
);
