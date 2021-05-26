#!/bin/bash

sshpass -p usuario ssh root@server3.sharmaa.es shutdown -r now && echo "El Servidor3 se reiniciará inmediatamente"
