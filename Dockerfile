# Usando a imagem base PHP com Apache
FROM php:8.2-apache

# Copiar os arquivos PHP para o diretório de documentos do Apache
COPY ./src /var/www/html

# Instalar dependências adicionais, se necessário

# RUN apt-get update && \
#     rm /etc/apt/preferences.d/no-debian-php && \
#     apt-get install -y php-mysql && \
#     docker-php-ext-install mysqli && \
#     docker-php-ext-enable mysqli 


# Configurar o Apache
# RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf && \
#     exec apache2-foreground