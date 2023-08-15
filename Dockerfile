FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends --no-install-suggests nginx && \
    rm -rf /var/lib/apt/lists/* && \ 
	docker-php-ext-install pdo pdo_mysql

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
	&& ln -sf /dev/stderr /var/log/nginx/error.log \
	&& ln -sf /dev/stderr /var/log/php-fpm.log

RUN rm -f /etc/nginx/sites-enabled/*

COPY docker/supervisor/nginx.conf /etc/nginx/conf.d/nginx.conf

RUN mkdir -p /run/php && touch /run/php/php-fpm.sock && touch /run/php/php-fpm.pid
RUN rm -f /usr/local/etc/php-fpm.d/*.conf
COPY docker/supervisor/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf

COPY /docker/supervisor/entrypoint.sh /entrypoint.sh
RUN chmod 755 /entrypoint.sh

EXPOSE 80

CMD ["/entrypoint.sh"]

RUN apt-get update && apt-get install -y --no-install-recommends --no-install-suggests supervisor

COPY . /app
COPY docker/supervisor/supervisor.conf /etc/supervisor/conf.d/supervisor.conf
