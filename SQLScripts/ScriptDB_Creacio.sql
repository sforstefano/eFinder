
--DELETE
drop table Comentari;
drop table Apunta;
drop table Esdeveniment;
drop table Usr_Promotor;
drop table id_tipus_edv;
drop table Usuari;

--SELECTS

select * from Usuari;
select * from Usr_Promotor;
select * from Comentari;
select * from Apunta;
select * from Esdeveniment;
select * from id_tipus_edv;


CREATE TABLE Usuari (
 
	id int not null IDENTITY(1,1) PRIMARY KEY,
	mail varchar(200) not null unique,
	nom_usuari varchar(150) not null unique,
    nom varchar(100),
    cognoms varchar(250),
	psswd varchar(50) not null,
	esPromotor char(1) not null,
	data_creacio SMALLDATETIME
	
);

create table id_tipus_edv (
    id int not null IDENTITY(1,1) PRIMARY KEY,
    tipus_edv varchar(100)
);


create table Usr_Promotor (
	id_usuari int PRIMARY KEY,
	validat char(1),
	cif_promotor char(9),
	adreca varchar(200),
	nom_local varchar(200),
	num_events_creats int,
	foreign key (id_usuari) references Usuari (id)
);


create table Esdeveniment(
	id_esdeveniment int not null auto_increment,
    id_promotor int,
    tipus int,
	nom_esdeveniment varchar(300),
    preu int,
    localitzacioGoogle varchar(200),
    data_inici DATETIME,
    data_fi DATETIME,
    descripcio varchar(500),
    primary key (id_esdeveniment,tipus),
    foreign key (id_promotor) references Usr_Promotor (id_usuari),
    foreign key (tipus) references id_tipus_edv (id)
);
ALTER TABLE esdeveniment ADD COLUMN lloc VARCHAR( 100 ) AFTER localitzacioGoogle
alter table esdevenimentadd column data_m varchar(100) after data_fi
ALTER TABLE esdeveniment ADD COLUMN entrada VARCHAR( 100 ) AFTER preu

create table Apunta(
    id_usuari int ,
    id_esdeveniment int,
	tipus int,
    data_accepta SMALLDATETIME,
    data_rebutja SMALLDATETIME,
    primary key (id_usuari,id_esdeveniment),
    foreign key (id_usuari) references Usuari (id),
    foreign key (id_esdeveniment,tipus) references Esdeveniment (id_esdeveniment,tipus)
);

create table Comentari(
    id_comentari int not null IDENTITY(1,1) PRIMARY KEY,
    id_usuari int ,
    id_esdeveniment int,
	tipus int,
    comentari varchar(500),
    data_creacio SMALLDATETIME,
    data_modificacio SMALLDATETIME,
    data_eliminacio SMALLDATETIME,
    foreign key (id_usuari) references Usuari (id),
    foreign key (id_esdeveniment,tipus) references Esdeveniment (id_esdeveniment,tipus)
);

