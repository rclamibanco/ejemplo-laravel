create database ejemplo;
use ejemplo;

create table marcas(
	id int auto_increment primary key,
    nombre varchar(75) not null
)engine=innodb;

create table autos(
	id_auto int auto_increment primary key,
    modelo varchar(100) not null,
    idmarca int not null,
    anio char(4) not null
)engine=innodb;

alter table autos
add foreign key (idmarca) references marcas(id);