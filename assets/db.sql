-------------------------------------------
-- ADMINS
-------------------------------------------

DROP TABLE admin;

CREATE TABLE admin (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    admin_num VARCHAR(12) NOT NULL
    admin_password VARCHAR(500) NOT NULL,

    user_id INT(12) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO admin VALUES (1, "admin", "test", "admin@test.com", "12EA5G789I23");

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

INSERT INTO developers VALUES (1, "LocalThunk");
INSERT INTO developers VALUES (2, "Scott Cawthon");

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

    developer_id int(12),
    FOREIGN KEY (developer_id) REFERENCES developers(developer_id)
);

INSERT INTO games VALUES (1, "Balatro", "gambling", "", "", "", 0, 1);
INSERT INTO games VALUES (2, "Five Nights at Freddy's", "scary", "", "", "", 0, 2);
INSERT INTO games VALUES (3, "Clash Royale", "broken", "", "", "", 0, 2);


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

-------------------------------------------
-- USERS
-------------------------------------------
CREATE TABLE users (
    id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(500) NOT NULL,
    email VARCHAR(150) DEFAULT NULL,
    banner_name VARCHAR(500) DEFAULT NULL,
    profile_picture_name VARCHAR(500) DEFAULT NULL,

    cart_id INT(12),
    FOREIGN KEY (cart_id) REFERENCES cart(cart_id)
);

INSERT INTO users VALUES (1, "jeb12", "jebjebjeb", "jeb12@gmail.com", "", "", 1);
