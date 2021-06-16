/* DML CON LOS INSERT DE LAS TABLAS DE SHARMAA.ES */

/* Tabla emple */
insert into emple (id, nombre, apellidos, telefono, dni, email, usuario, password, cargo)
values (1000,'Maria', 'Gomez Palo', 91111, '111111A', 'maria@sharmaa.es', 'magope', 1234, 'administrador'),(1002,'Alberto', 'Sanchez Bueno', 91112, '111111B', 'alberto@sharmaa.es', 'alsabu', 1234, 'empleado'),(1001,'Pedro', 'Tejado Polar', 91113, '111111C', 'pedro@sharmaa.es', 'petepo', 1234, 'empleado'),(1003,'Carla', 'Mañon Jira', 91114, '111111D', 'carla@sharmaa.es', 'camaji', 1234, 'empleado');

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
