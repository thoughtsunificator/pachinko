FROM php:7.4-fpm

RUN apt-get update \
	&& apt-get install -y --no-install-recommends libpq-dev \
	&& docker-php-ext-install mysqli pdo_pgsql pdo_mysql

#RUN chown -R www-data:www-data /app
#USER www-data
