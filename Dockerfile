FROM nginx:latest
EXPOSE 80

RUN mv /etc/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf_DISABLED \
  mkdir /var/www/html/site

COPY ./front1/nginx_conf/* /etc/nginx/conf.d/
COPY --chown=root:nginx ./front1/site_static/* /var/www/html/site/
