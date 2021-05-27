/* Borra las base de datos y la vuelve a crear. */
--> DELETE es el comando para borrar la DB (si existe), lo he sustituido por el CREATE anterior*/
/* DELETE DATABASE IF EXISTS dbsharmaa; */

/* create database dbsharmaa;
   use dbsharmaa; */

/* serial significa que se autoincrementa solo y además en primary key junto con dni */
/* Al utilizar nextVal() de una serie el tipo de dato debe ser integer o sus variaciones (bigint, tinyint) */
create sequence seqID start 1000;
create table emple (
    id bigint default nextval('seqID') primary key,
    nombre character varying,
    apellidos character varying,
    telefono integer,
    dni character varying,
    email character varying not null,
    usuario character varying,
    password character varying not null,
    cargo character varying not null
);

create table server (
    servername character varying primary key
);

/*Falta id_emple */
/*Para textos largos mejor utilizar el tipo de dato 'text'*/
create table incidencia (
    id bigint default nextval('seqID') primary key,
    id_emple bigint references emple(id),
    prioridad character varying not null,
    hora timestamp not null default now(),
    descripcion text not null,
    servername character varying references server(servername)
);

create table estado_incidencia ( 
    id serial references incidencia (id),
    estado character varying,
    hora timestamp not null default now(),
    check (estado='Pendiente' or estado = 'En desarrollo' or estado = 'Resuelta') 
);

create table scripts (
    script character varying not null
);
