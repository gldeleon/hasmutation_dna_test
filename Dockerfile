FROM debian:latest

LABEL MAINTAINER Leonel De Leon <gldeleon@live.com.mx>

RUN apt-get -y update && apt-get -y upgrade

RUN apt-get install -y apache2

RUN mkdir -p /var/www/html/mutation_dna/public_html

RUN apt-get install -y composer

WORKDIR /var/www/html/mutation_dna/public_html

COPY composer.json /var/www/html/mutation_dna/public_html

RUN apt-get install -y php

RUN apt-get install -y php-gd php-xml php-curl php-mbstring php-gmp

RUN chown www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html

RUN composer install

COPY . .

EXPOSE 80

RUN apt-get install -y git

RUN cd /var/www/html/mutation_dna/public_html

RUN php -S 0.0.0.0:8000 -t public