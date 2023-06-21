CREATE DATABASE webapp2;

CREATE TABLE boekingen (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int ,
    reis_id int,
    datum date,
    CONSTRAINT FK_user_id
    FOREIGN KEY (user_id) REFERENCES login(id),
    CONSTRAINT FK_reis_id
    FOREIGN KEY (reis_id) REFERENCES reizen(id)
);

CREATE TABLE contact (
    id SERIAL PRIMARY KEY,
    user_id int,
    bericht text,
    onderwerp text,
    CONSTRAINT FK_user_id_1
    FOREIGN KEY (user_id) REFERENCES login(id)
);

s
CREATE TABLE login (
    id int PRIMARY KEY AUTO_INCREMENT,
    username text,
    email text,
    password text,
    isadmin bit(1) 
);

CREATE TABLE recensie (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    reis_id int,
    rating decimal(10,1),
    bericht text,
    CONSTRAINT FK_user_id_2
    FOREIGN KEY (user_id) REFERENCES login(id),
    CONSTRAINT FK_reis_id_1
    FOREIGN KEY (reis_id) REFERENCES reizen(id)
);

CREATE TABLE reizen (
    id int PRIMARY KEY AUTO_INCREMENT,
    title text,
    omschrijving text,
    reisinfo text,
    rating decimal(10,1),
    star decimal(5,1),
    image text,
    prijs int(6)
);


