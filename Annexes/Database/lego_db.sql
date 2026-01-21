DROP DATABASE IF EXISTS lego_inventory_db;
CREATE DATABASE lego_inventory_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE lego_inventory_db;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS pieces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number SMALLINT NOT NULL,
    color VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    image_url VARCHAR(500) NOT NULL UNIQUE,
    UNIQUE (number, color),

    kit_id INT NOT NULL,
    CONSTRAINT fk_pieces_kit
    FOREIGN KEY (kit_id) REFERENCES kits(id),

    box_id INT NOT NULL,
    CONSTRAINT fk_pieces_box
    FOREIGN KEY (box_id) REFERENCES boxes(id)
); 

CREATE TABLE IF NOT EXISTS kits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number SMALLINT NOT NULL UNIQUE
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

-- table (n:m) builds_pieces
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

SET FOREIGN_KEY_CHECKS = 1;

-- seeder db example data

INSERT INTO classrooms (code, name, location) VALUES
(101, 'Salle Robotique', 'Yverdon-les-Bains'),
(102, 'Salle Création', 'Ste-Croix');

INSERT INTO cupboards (number, classroom_id) VALUES
('A01', 1),
('B12', 2);

INSERT INTO boxes (number, size, cupboard_id) VALUES
(10, 'small', 1),
(20, 'medium', 1),
(30, 'big', 2);

INSERT INTO kits (number) VALUES
(500),
(501),
(502);

INSERT INTO pieces (number, color, name, quantity, image_url, kit_id, box_id) VALUES
(3001, 'red', 'Brick 2x4', 50, 'https://example.com/pieces/3001-red.jpg', 1, 1),
(3002, 'blue', 'Brick 2x3', 30, 'https://example.com/pieces/3002-blue.jpg', 1, 2),
(6141, 'yellow', 'Plate 1x1 Round', 100, 'https://example.com/pieces/6141-yellow.jpg', 2, 2),
(2456, 'black', 'Brick 2x6', 20, 'https://example.com/pieces/2456-black.jpg', 3, 3);

INSERT INTO builds (name, image_url) VALUES
('Mini Voiture', 'https://example.com/builds/car.jpg'),
('Petit Robot', 'https://example.com/builds/robot.jpg');

INSERT INTO builds_pieces (build_id, piece_id, quantity) VALUES
(1, 1, 4),   -- Mini voiture utilise 4x Brick 2x4 rouge
(1, 2, 2),   -- Mini voiture utilise 2x Brick 2x3 bleu
(2, 3, 6),   -- Petit robot utilise 6x Plate 1x1 jaune
(2, 4, 3);   -- Petit robot utilise 3x Brick 2x6 noir

INSERT INTO users (name, password_hash) VALUES
('admin', '$2y$10$abcdefghijklmnopqrstuv123456789012345678901234567890'),
('prof', '$2y$10$zyxwvutsrqponmlkjihgf987654321098765432109876543210');