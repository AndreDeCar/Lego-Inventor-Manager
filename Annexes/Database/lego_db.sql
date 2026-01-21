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