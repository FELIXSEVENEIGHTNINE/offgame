-------------------------------------------
-- USERS
------------------------------------------- done
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    user_id INT(12) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(500) NOT NULL,
    email VARCHAR(150) DEFAULT NULL,
    banner_name VARCHAR(500) DEFAULT NULL,
    profile_picture_name VARCHAR(500) DEFAULT NULL
);

INSERT INTO users VALUES (1, "jeb12", "jebjebjeb", "jeb12@gmail.com", "", "");

-------------------------------------------
-- ADMINS
------------------------------------------- done
DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    admin_num VARCHAR(12) PRIMARY KEY,
    admin_id INT(6) NOT NULL,
    user_id INT(12) DEFAULT NULL,
    admin_username VARCHAR(255) NOT NULL,
    admin_password VARCHAR(500) NOT NULL
);

-- ALTER TABLE admin ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

INSERT INTO admin (admin_num, admin_id, admin_username, admin_password) VALUES ("1A2B3C4D5E6F", 1, "admin", "test");
INSERT INTO admin VALUES ("123ASD456FGH", 2, 1, "yes", "test2");

-------------------------------------------
-- BLOG 
------------------------------------------- done
DROP TABLE IF EXISTS blog;

CREATE TABLE blog (
    blog_id INT(8) AUTO_INCREMENT PRIMARY KEY,
    blog_date VARCHAR(500) DEFAULT NULL,
    blog_title VARCHAR(500) DEFAULT NULL,
    blog_text VARCHAR(500) DEFAULT NULL
);

INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("January 1, 2023", "First Post", "hi");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("February 2, 2023", "Welcome 2", "hi2");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("March 3, 2023", ":3", "hi3");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("April 4, 2023", ":3c", "hi");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("May 5, 2023", "yes", "hi2");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("June 6, 2023", "Yes, you read this right", "hi3");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("July 7, 2023", "Fallout is epic", "hi");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("August 8, 2023", "Welcome 1", "hi2");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("September 9, 2023", "Welcome 2", "hi3");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("October 10, 2023", "Welcome 3", "hi");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("November 11, 2023", "Welcome 4", "hi2");
INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ("December 12, 2023", "Welcome 5", "hi3");

-------------------------------------------
-- CREDIT
-------------------------------------------
DROP TABLE credit;

CREATE TABLE credit (
    credit_id INT(12) AUTO_INCREMENT PRIMARY KEY,
    amount INT(24) DEFAULT NULL,
    card_number VARCHAR(255) DEFAULT NULL,
    user_id INT(12)
);

ALTER TABLE credit ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

INSERT INTO developers (amount, user_id)VALUES (1, 1);

-------------------------------------------
-- CART
-------------------------------------------
CREATE TABLE cart (
    cart_id INT(12) PRIMARY KEY,
    game_id INT(24)
);

-------------------------------------------
-- DEVELOPERS
-------------------------------------------
DROP TABLE IF EXISTS developers;

CREATE TABLE developers (
    developer_id INT(12) AUTO_INCREMENT NOT NULL,
    developer_name VARCHAR(255) DEFAULT NULL,

    user_id INT(12)
);

ALTER TABLE developers ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

INSERT INTO developers (developer_name) VALUES ("LocalThunk");
INSERT INTO developers (developer_name, user_id) VALUES ("Scott Cawthon", 1);

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
DROP TABLE IF EXISTS games;

CREATE TABLE games (
    game_id INT(24) AUTO_INCREMENT PRIMARY KEY,
    game_name VARCHAR(500) DEFAULT NULL,
    game_description TEXT DEFAULT NULL,
    game_logo VARCHAR(255) DEFAULT NULL,
    game_banner VARCHAR(255) DEFAULT NULL,
    game_photo VARCHAR(255) DEFAULT NULL,
    game_ad INT(1) DEFAULT NULL,
    developer_id int(12),
    ad_name VARCHAR(255) DEFAULT NULL
);

ALTER TABLE games ADD FOREIGN KEY (developer_id) REFERENCES developers(developer_id);

INSERT INTO games VALUES (1, "Balatro", "gambling", "balatro", "", "", 0, 1, "");
INSERT INTO games VALUES (2, "Five Nights at Freddy's", "scary", "fnaf", "fnaf_banner", "", 1, 2, "fnaf");
INSERT INTO games VALUES (3, "Clash Royale", "broken", "clashroyale", "", "",  0, 2, "");


-------------------------------------------
-- GENRES
-------------------------------------------

DROP TABLE IF EXISTS genres;

CREATE TABLE genres (
    genre_id INT(12) AUTO_INCREMENT PRIMARY KEY, 
    genre_name VARCHAR(255) DEFAULT NULL
);

INSERT INTO genres VALUES (1, "Action");
INSERT INTO genres VALUES (2, "Horror");



-------------------------------------------
-- GAME CATEGORY
-------------------------------------------
DROP TABLE IF EXISTS game_category;

CREATE TABLE game_category (
    category_id INT(24) AUTO_INCREMENT PRIMARY KEY,
    
    game_id INT(24),
    genre_id int(12)
);

ALTER TABLE game_category ADD FOREIGN KEY (game_id) REFERENCES games(game_id);
ALTER TABLE game_category ADD FOREIGN KEY (genre_id) REFERENCES genres(genre_id);

INSERT INTO game_category (game_id, genre_id) VALUES (2, 1);
INSERT INTO game_category (game_id, genre_id) VALUES (2, 2);

-------------------------------------------
-- ACHIEVEMENTS
-------------------------------------------
DROP TABLE IF EXISTS achievement_data;

CREATE TABLE achievement_data (
    achieve_id INT(12) AUTO_INCREMENT PRIMARY KEY,
    achieve_name VARCHAR(100) NOT NULL
);

INSERT INTO achievement_data VALUES (1, "Try Playing Dead");
INSERT INTO achievement_data VALUES (2, "Poor Choice Career");
INSERT INTO achievement_data VALUES (3, "Never Stood a Chance");
INSERT INTO achievement_data VALUES (4, "Together, We Are FNAF");
INSERT INTO achievement_data VALUES (5, "Give Gifts, Give Life");
INSERT INTO achievement_data VALUES (6, "Happiest Day");
INSERT INTO achievement_data VALUES (7, "I'm Pretending");
INSERT INTO achievement_data VALUES (8, "Hello, Hello");
INSERT INTO achievement_data VALUES (9, "We Are Still Your Friends");
INSERT INTO achievement_data VALUES (10, "Keep It Wound Up");
INSERT INTO achievement_data VALUES (11, "ITS ME");

-------------------------------------------
-- ACHIEVEMENT
-------------------------------------------
DROP TABLE IF EXISTS achievements;

CREATE TABLE achievements (
    achieve_id INT(12) AUTO_INCREMENT PRIMARY KEY,

    game_id INT(24),
    user_id INT(12),
    achievement_id INT(12)
);

ALTER TABLE achievements ADD FOREIGN KEY (game_id) REFERENCES games(game_id);
ALTER TABLE achievements ADD FOREIGN KEY (user_id) REFERENCES users(user_id);
ALTER TABLE achievements ADD FOREIGN KEY (achievement_id) REFERENCES achievement_data(achieve_id);

INSERT INTO achievements (game_id, user_id, achievement_id) VALUES (2, 1, 1);
INSERT INTO achievements (game_id, user_id, achievement_id) VALUES (2, 1, 2);
INSERT INTO achievements (game_id, user_id, achievement_id) VALUES (2, 1, 3);
INSERT INTO achievements (game_id, user_id, achievement_id) VALUES (2, 1, 4);