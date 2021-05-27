#!/bin/bash

sshpass -p usuario ssh root@server1.sharmaa.es shutdown -r now && echo "El Servidor1 se reiniciará inmediatamente"
