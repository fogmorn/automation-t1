FROM nanoninja/php-fpm:latest

RUN echo 0 > /proc/sys/kernel/yama/ptrace_scope

COPY ./php-fpm.conf /usr/local/etc/
