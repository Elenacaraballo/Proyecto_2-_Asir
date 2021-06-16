#!/bin/sh
# Se comprueba que sólo haya un parámetro
# Se toma el primer parámetro como el email

if test $# -eq 1 ; 
then
	email=$1
else
	echo "No se han proporcionado los parámetros correctamente";
exit 1
fi

# El primer campo tomará el nombre de usuario del primer parámetro pasado

usuarioSistema=$(echo $email | cut -d '@' -f 1)

# El segundo campo tomará el dominio del primer parámetro pasado

dominio=$(echo $email | cut -d '@' -f 2)

#Sólo si el dominio es sharmaa.es y el usuarioSistema no está vacío se añadirá un nuevo usuario de sistema

if test $dominio = 'sharmaa.es'; 
then
	echo "El email $email tenía como dominio sharmaa.es. Comprobando que el nombre de usuario no esté vacío."

	if test $usuarioSistema != '' ; 
	then
		echo "Se crea el usuario de sistema $usuarioSistema."
		sudo adduser $usuarioSistema -p $(openssl passwd -1 $usuarioSistema)
	fi
fi
