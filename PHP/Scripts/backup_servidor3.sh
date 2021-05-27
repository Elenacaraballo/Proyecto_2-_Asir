#!/bin/bash
DATE = $(date +%Y-%m-%d-%H%M%S)
#comprimir la carpeta personal del usuario por defecto en el servidor
sshpass -p usuario ssh root@server3.sharmaa.es tar -czf /tmp/backup-$DATE.tar.gz /home/usuario
#copiar al servidor centos
sshpass -p usuario scp root@server3.sharmaa.es:/tmp/backup-$DATE.tar.gz /var/www/sharmaa.es/html/Backup
#borrar el archivo temporal
sshpass -p usuario ssh root@server3.sharmaa.es rm -r /tmp/backup-$DATE.tar.gz

echo "Directorio copiado al directorio Backup."
