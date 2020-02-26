FROM trafex/alpine-nginx-php7:latest
MAINTAINER Chloé "Matcha" Desoutter <ChloeTigre@gitlab.invalid>
USER root
RUN apk add php-sqlite3
USER nobody
COPY ./app/ /var/www/html
