create database BienesRaices

use BienesRaices

create table seller(
    id int PRIMARY KEY not null AUTO_INCREMENT,
    name varchar(32) not null,
    email varchar(32) not null,
    phone varchar(10)
);


create table propierties(
    id int PRIMARY KEY not null AUTO_INCREMENT,
    title varchar(15) not null,
    price decimal(10,2) not null,
    image varchar(128),
    description longtext,
    room int(1),
    wc int (1),
    garages int (1),
    timestamp date,
    id_seller int not null,
    foreign key (id_seller) references seller(id)
);

select * from seller

select * from propierties