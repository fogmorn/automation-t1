FROM nanoninja/php-fpm:latest

RUN apt-get update && apt-get install -y \
  strace \
  net-tools \
  procps \
  vim

COPY ./php-fpm.conf /usr/local/etc/
COPY ./site.conf /usr/local/etc/php-fpm.d/
