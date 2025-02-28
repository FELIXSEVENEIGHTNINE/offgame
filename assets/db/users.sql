-------------------------------------------
-- Cart
-------------------------------------------
CREATE TABLE cart (
    cart_id INT(12) PRIMARY KEY,
    game_id INT(24),

    FOREIGN KEY (game_id) REFERENCES games(game_id),


);

-------------------------------------------
-- Admin
-------------------------------------------
CREATE TABLE admin (
    admin_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(500) NOT NULL,

    email VARCHAR(150) DEFAULT NULL,
    admin_id VARCHAR(12) NOT NULL
);

INSERT INTO admin VALUES (1, "admin", "test", "admin@test.com", "12EA5G789I23");

-------------------------------------------
-- Post
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
-- Post
-------------------------------------------

CREATE TABLE credit(
    
);

-------------------------------------------
-- Post
-------------------------------------------

CREATE TABLE blog(

);