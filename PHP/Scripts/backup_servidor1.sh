#!/bin/bash
DATE = $(date +%Y-%m-%d-%H%M%S)
#comprimir la carpeta personal del usuario por defecto en el servidor
sshpass -p usuario ssh root@server1.sharmaa.es tar -czf /tmp/backupServidor1-$DATE.tar.gz /home/usuario
#copiar al servidor centos
sshpass -p usuario scp root@server1.sharmaa.es:/tmp/backupServidor1-$DATE.tar.gz /var/www/sharmaa.es/html/Backup
#borrar el archivo temporal
sshpass -p usuario ssh root@server1.sharmaa.es rm -r /tmp/backupServidor1-$DATE.tar.gz

echo "Directorio /home del Servidor1 ha sido copiado al directorio Backup."
