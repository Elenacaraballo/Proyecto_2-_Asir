/* DML CON LOS INSERT DE LAS TABLAS DE SHARMAA.ES */

/* Tabla emple */
insert into emple (id, nombre, apellidos, telefono, dni, email, usuario, password, cargo)
values (1000,'María', 'Gómez Palo', 91111, '111111A', 'maria@examen.com', 'magope', 1234, 'Jefe de Proyecto'),(1002,'Alberto', 'Sánchez Bueno', 91112, '111111B', 'alberto@example.com', 'alsabu', 1234, 'Administrador'),(1003,'Marta', 'Tejado Fias', 91113, '111111C', 'marta@example.com', 'matefi', 1234, 'Empleado'),(1004,'Alejandro', 'Loreal Jiménez', 91114, '111111D', 'alejandro@example.com', 'alloji', 1234, 'Empleado'),(1005,'Ismael', 'Rodriguez Leal', 91115, '111111E', 'ismael@example.com', 'isrole', 1234, 'Empleado'),(1006,'Rodrigo', 'Dejado Deldado', 91116, '111111F', 'rodrigo@example.com', 'rodede', 1234, 'Empleado');

/* Tabla servers */

insert into server (servername)
values ('Servidor1'),('Servidor2'),('Servidor3');

/*  Tabla  incidencia */ 

insert into incidencia (id_emple, prioridad, descripcion, servername)
values (1000, 'alta', 'reinicio', 'Servidor1'),(1005, 'media', 'backup', 'Servidor3');

/* Tabla estado_incidencia */

insert into estado_incidencia (id, estado)
values (1000, 'Pendiente'),(1003, 'Resuelta');

/* Tabla scripts */

insert into scripts (script)
values ('backup_servidor1.sh'),('backup_servidor2.sh'),('backup_servidor3.sh'),('restart_servidor1.sh'),('restart_servidor2.sh'),('restart_servidor3.sh'),('print_log_servidor1.sh'),('print_log_servidor2.sh'),('print_log_servidor3.sh'),('reset_password.php');
