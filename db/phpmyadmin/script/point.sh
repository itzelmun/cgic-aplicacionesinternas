#!/bin/bash

set -eo pipefail

# Función para esperar hasta que la base de datos esté disponible
wait_for_database() {
  local max_attempts=30
  local sleep_duration=5
  local attempt=1
  local host="$1"
  local port="$2"

  until nc -z "$host" "$port"; do
    if (( attempt == max_attempts )); then
      echo "La base de datos no está disponible después de $attempt intentos. Saliendo..."
      exit 1
    fi

    echo "Esperando a que la base de datos esté disponible (Intento $attempt/$max_attempts)..."
    sleep "$sleep_duration"
    attempt=$(( attempt + 1 ))
  done
}

# Variables de configuración de la base de datos
nombre_host=${DB_HOST}
db_port="3306"
usuario_bd=${MYSQL_USER}
contrasena_bd=${MYSQL_PASSWORD}
base_datos_nombre=${MYSQL_DATABASE}

# Esperar a que la base de datos esté disponible
wait_for_database "$db_host" "$db_port"

# Migrar la base de datos
echo "Realizando migración de la base de datos..."

# Ejemplo de comando para importar el archivo cgic.sql utilizando MySQL
mysql -h "$nombre_host" -P "$db_port" -u "$usuario_bd" -p"$contrasena_bd" "$base_datos_nombre" < /docker-entrypoint-initdb.d/cgic.sql

echo "Migración completada con éxito."

# Ejecutar el comando de inicio original del contenedor
exec "$@"
