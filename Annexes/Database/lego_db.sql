DROP DATABASE IF EXISTS lego_inventory_db;
CREATE DATABASE lego_inventory_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE lego_inventory_db;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS pieces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    image_url VARCHAR(500) NOT NULL UNIQUE,
    UNIQUE (number, color),

    box_id INT NOT NULL,
    CONSTRAINT fk_pieces_box
    FOREIGN KEY (box_id) REFERENCES boxes(id)
); 

CREATE TABLE IF NOT EXISTS kits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number INT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS boxes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number SMALLINT NOT NULL UNIQUE,
    size ENUM('small', 'medium', 'big') NOT NULL,

    cupboard_id INT NOT NULL,
    CONSTRAINT fk_boxes_cupboard
    FOREIGN KEY (cupboard_id) REFERENCES cupboards(id)
);

CREATE TABLE IF NOT EXISTS builds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    image_url VARCHAR(500) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS cupboards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number VARCHAR(4) NOT NULL UNIQUE,

    classroom_id INT NOT NULL,
    CONSTRAINT fk_cupboards_classroom
    FOREIGN KEY (classroom_id) REFERENCES classrooms(id)
);

CREATE TABLE IF NOT EXISTS classrooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code TINYINT UNSIGNED NOT NULL UNIQUE,
    name CHAR(50) NOT NULL UNIQUE,
    location ENUM('Yverdon-les-Bains', 'Ste-Croix') NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    password_hash CHAR(60) NOT NULL UNIQUE
);

-- tables (n:m)
CREATE TABLE IF NOT EXISTS builds_pieces (
    build_id INT NOT NULL,
    piece_id INT NOT NULL,
    quantity INT NOT NULL,

    CONSTRAINT pk_builds_pieces
    PRIMARY KEY (build_id, piece_id),

    CONSTRAINT fk_bp_build
    FOREIGN KEY (build_id) REFERENCES builds(id),

    CONSTRAINT fk_bp_piece
    FOREIGN KEY (piece_id) REFERENCES pieces(id)
);

CREATE TABLE IF NOT EXISTS kits_pieces (
    kit_id INT NOT NULL,
    piece_id INT NOT NULL,

    CONSTRAINT pk_kits_pieces
    PRIMARY KEY (kit_id, piece_id),

    CONSTRAINT fk_kp_kit
    FOREIGN KEY (kit_id) REFERENCES kits(id),

    CONSTRAINT fk_kp_piece
    FOREIGN KEY (piece_id) REFERENCES pieces(id)
);

SET FOREIGN_KEY_CHECKS = 1;

-- Seeder

INSERT INTO classrooms (code, name, location)
VALUES (1, 'Salle Robotique', 'Yverdon-les-Bains');

INSERT INTO cupboards (number, classroom_id)
VALUES ('A01', 1);

INSERT INTO boxes (number, size, cupboard_id)
VALUES (101, 'medium', 1);

INSERT INTO kits (number)
VALUES (51515);

INSERT INTO builds (name, image_url)
VALUES ('Charlie', 'https://www.lego.com/cdn/cs/set/assets/bltc4a9545c4162665a/03-Adults_Welcome-Article_Fizzy-_ArticleAsset.png?fit=crop&quality=80&width=700&dpr=1');

INSERT INTO pieces (number, color, name, quantity, image_url, box_id)
VALUES
    (67351, 'white', 'Robot Inventor Hub', 1, 'https://example.com/hub.png', 1),
    (54675, 'black', 'Large Motor', 2, 'https://example.com/large_motor.png', 1),
    (54696, 'black', 'Medium Motor', 2, 'https://example.com/medium_motor.png', 1),
    (47597, 'black', 'Distance Sensor', 1, 'https://example.com/distance_sensor.png', 1),
    (47598, 'black', 'Color Sensor', 1, 'https://example.com/color_sensor.png', 1),
    (32054, 'light bluish gray', 'Technic Pin 3L', 50, 'https://example.com/pin3l.png', 1),
    (6558, 'black', 'Technic Axle 3L', 30, 'https://example.com/axle3l.png', 1),
    (32523, 'light bluish gray', 'Technic Beam 3L', 20, 'https://super-briques.fr/7204-home_default/plate-1x2-piece-lego-3023.jpg', 1),
    (3555, 'yellow', 'Brick 2L', 20, 'https://super-briques.fr/6412-medium_default/brique-1x4-piece-lego-3010.jpg', 1);

INSERT INTO kits_pieces (kit_id, piece_id)
SELECT 1, id FROM pieces;

INSERT INTO builds_pieces (build_id, piece_id, quantity)
VALUES
    (1, 1, 1), 
    (1, 2, 2),  
    (1, 5, 1),  
    (1, 6, 10), 
    (1, 7, 6),  
    (1, 8, 4);  