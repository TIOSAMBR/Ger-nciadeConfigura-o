#!/bin/bash

# Espera até que o MySQL esteja pronto para aceitar conexões
until mysql -uroot -proot -e ";" > /dev/null 2>&1; do
    echo "MySQL ainda não está pronto, aguardando..."
    sleep 1
done

# Executa o script SQL de inicialização
echo "MySQL está pronto, executando script de inicialização..."
mysql -uroot -proot < /docker-entrypoint-initdb.d/init.sql
