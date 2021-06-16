#!/bin/bash
DATE = $(date +%Y-%m-%d-%H%M%S)
#comprimir la carpeta personal del usuario por defecto en el servidor
sshpass -p usuario ssh root@server2.sharmaa.es tar -czf /tmp/backupServidor2-$DATE.tar.gz /home/usuario
#copiar al servidor centos
sshpass -p usuario scp root@server2.sharmaa.es:/tmp/backupServidor2-$DATE.tar.gz /var/www/sharmaa.es/html/Backup
#borrar el archivo temporal
sshpass -p usuario ssh root@server2.sharmaa.es rm -r /tmp/backupServidor2-$DATE.tar.gz

echo "Directorio /home del Servidor2 ha sido copiado al directorio Backup."
