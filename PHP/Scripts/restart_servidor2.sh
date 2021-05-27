#!/bin/bash

sshpass -p usuario ssh root@server2.sharmaa.es shutdown -r now && echo "El Servidor2 se reiniciará inmediatamente"
