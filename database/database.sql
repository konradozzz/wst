# DROP DATABASE cljunggr;
CREATE DATABASE IF NOT EXISTS cljunggr;
USE cljunggr;

CREATE TABLE color (
    color_id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(10) NOT NULL,
    CONSTRAINT type_unique UNIQUE (type)
);

INSERT INTO color (type) VALUES ('White');
INSERT INTO color (type) VALUES ('Black');

CREATE TABLE piece (
    piece_id INT PRIMARY KEY,
    type VARCHAR(10),
    color_id INT,
    image VARCHAR(20),
    FOREIGN KEY (color_id) REFERENCES color (color_id)
);

select p.piece_id, p.type, c.type, p.image from piece p left join color c on p.color_id = c.color_id;
INSERT INTO piece (piece_id, type, color_id, image) VALUES (1, 'Rook', (SELECT color_id FROM color WHERE type = 'White'), 'white_rook.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (2, 'Rook', (SELECT color_id FROM color WHERE type = 'White'), 'white_rook.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (3, 'Knight', (SELECT color_id FROM color WHERE type = 'White'), 'white_knight.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (4, 'Knight', (SELECT color_id FROM color WHERE type = 'White'), 'white_knight.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (5, 'Bishop', (SELECT color_id FROM color WHERE type = 'White'), 'white_bishop.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (6, 'Bishop', (SELECT color_id FROM color WHERE type = 'White'), 'white_bishop.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (7, 'Queen', (SELECT color_id FROM color WHERE type = 'White'), 'white_queen.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (8, 'King', (SELECT color_id FROM color WHERE type = 'White'), 'white_king.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (9, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (10, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (11, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (12, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (13, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (14, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (15, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (16, 'Pawn', (SELECT color_id FROM color WHERE type = 'White'), 'white_pawn.png');

INSERT INTO piece (piece_id, type, color_id, image) VALUES (17, 'Rook', (SELECT color_id FROM color WHERE type = 'Black'), 'black_rook.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (18, 'Rook', (SELECT color_id FROM color WHERE type = 'Black'), 'black_rook.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (19, 'Knight', (SELECT color_id FROM color WHERE type = 'Black'), 'black_knight.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (20, 'Knight', (SELECT color_id FROM color WHERE type = 'Black'), 'black_knight.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (21, 'Bishop', (SELECT color_id FROM color WHERE type = 'Black'), 'black_bishop.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (22, 'Bishop', (SELECT color_id FROM color WHERE type = 'Black'), 'black_bishop.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (23, 'Queen', (SELECT color_id FROM color WHERE type = 'Black'), 'black_queen.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (24, 'King', (SELECT color_id FROM color WHERE type = 'Black'), 'black_king.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (25, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (26, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (27, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (28, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (29, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (30, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (31, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');
INSERT INTO piece (piece_id, type, color_id, image) VALUES (32, 'Pawn', (SELECT color_id FROM color WHERE type = 'Black'), 'black_pawn.png');


CREATE TABLE move (
    move_id INT PRIMARY KEY,
    delta_col SMALLINT,
    delta_row SMALLINT,
    recursive_rule BOOLEAN,
    can_capture BOOLEAN,
    must_capture BOOLEAN,
    CONSTRAINT move_unique UNIQUE (delta_col, delta_row, recursive_rule, can_capture, must_capture)
);
INSERT INTO move (move_id, delta_col, delta_row, recursive_rule, can_capture, must_capture)
VALUES (1, -1, 1, FALSE, TRUE, TRUE);
INSERT INTO move (move_id, delta_col, delta_row, recursive_rule, can_capture, must_capture)
VALUES (2, 3, 1, FALSE, FALSE, TRUE);



CREATE TABLE piece_move (
    piece_move_id INT PRIMARY KEY AUTO_INCREMENT,
    piece_id INT,
    move_id INT,
    FOREIGN KEY (piece_id) REFERENCES piece (piece_id),
    FOREIGN KEY (move_id) REFERENCES move (move_id),
    CONSTRAINT piece_move_unique UNIQUE (piece_id, move_id)
);

INSERT INTO piece_move (piece_id, move_id)
VALUES (1, 1);
INSERT INTO piece_move (piece_id, move_id)
VALUES (2, 1);
INSERT INTO piece_move (piece_id, move_id)
VALUES (2, 2);



CREATE TABLE start_state (
    piece_id INT PRIMARY KEY,
    col SMALLINT,
    row SMALLINT,
    CONSTRAINT position_unique UNIQUE (col, row),
    FOREIGN KEY (piece_id) REFERENCES piece (piece_id)
);


INSERT INTO start_state (piece_id, col, row)
VALUES (1, 0, 0);

INSERT INTO start_state (piece_id, col, row)
VALUES (2, 1, 0);

-- start_state:    piece_id(fk), column, row
-- data:
-- rook,   white, 1, 1, a
-- rook,   white, 2, 1, h
-- knight, white, 1, 1, b
-- knight, white, 2, 1, g
-- bishop, white, 1, 1, c
-- bishop, white, 2, 1, f
-- queen,  white, 1, 1, d
-- king,   white, 1, 1, e
-- pawn,   white, 1, 2, a
-- pawn,   white, 2, 2, b
-- pawn,   white, 3, 2, c
-- pawn,   white, 4, 2, d
-- pawn,   white, 5, 2, e
-- pawn,   white, 6, 2, f
-- pawn,   white, 7, 2, g
-- pawn,   white, 8, 2, h
-- 
-- rook,   black, 1, 8, a
-- rook,   black, 2, 8, h
-- knight, black, 1, 8, b
-- knight, black, 2, 8, g
-- bishop, black, 1, 8, c
-- bishop, black, 2, 8, f
-- queen,  black, 1, 8, d
-- king,   black, 1, 8, e
-- pawn,   black, 1, 7, a
-- pawn,   black, 2, 7, b
-- pawn,   black, 3, 7, c
-- pawn,   black, 4, 7, d
-- pawn,   black, 5, 7, e
-- pawn,   black, 6, 7, f
-- pawn,   black, 7, 7, g
-- pawn,   black, 8, 7, h


CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
    authority VARCHAR(10)
);

CREATE TABLE game (
    game_id INT PRIMARY KEY AUTO_INCREMENT,
    running BOOL NOT NULL
);

CREATE TABLE game_user (
    game_id INT,
    user_id INT,
    color_id INT,
    winner BOOL NOT NULL,
    PRIMARY KEY (game_id, user_id),
    FOREIGN KEY (user_id) REFERENCES user (user_id),
    FOREIGN KEY (game_id) REFERENCES game (game_id)
);

CREATE TABLE turn (
    turn_number INT,
    game_id INT,
    piece_id INT NOT NULL,
    to_col VARCHAR(1) NOT NULL,
    to_row VARCHAR(1) NOT NULL,
    PRIMARY KEY (turn_number, game_id),
    FOREIGN KEY (game_id) REFERENCES game (game_id)
);





-- TEST DATA
insert into user (name, password, authority) values ('admin', 'pass', 'admin');
insert into user (name, password, authority) values ('conny', 'pass', 'user');

insert into game (running) values (false);
insert into game (running) values (true);

insert into game_user (game_id, user_id, color_id, winner)
values (
    (select game_id from game where game_id = LAST_INSERT_ID()),
    (select user_id from user where name = 'conny'),
    (select color_id from color where type = 'White'),
    false);

insert into game_user (game_id, user_id, color_id, winner)
values (
    (select game_id from game where game_id = LAST_INSERT_ID()),
    (select user_id from user where name = 'admin'),
    (select color_id from color where type = 'Black'),
    false);

# insert into turn (turn_number, game_id, piece_id, to_col, to_row)
# values(
#     1,
#     (select game_id from game where game_id = LAST_INSERT_ID()),
#     -- pawn,   white, 2, 2, b
#     (select piece_id from piece where
#         type = 'Pawn' and
#         color_id = (select color_id from color where type = 'White') and
#         number = 2),
#     'b',
#     '4');
#
# insert into turn (turn_number, game_id, piece_id, to_col, to_row)
# values(
#     2,
#     (select game_id from game where game_id = LAST_INSERT_ID()),
# -- pawn,   black, 6, 7, f
#     (select piece_id from piece where
#         type = 'Pawn' and
#         color_id = (select color_id from color where type = 'Black') and
#         number = 6),
#     'f',
#     '6');
