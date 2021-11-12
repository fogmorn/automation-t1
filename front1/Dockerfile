FROM nginx:latest
EXPOSE 80

RUN mv /etc/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf_DISABLED; \
  mkdir -p /var/www/html/site

COPY ./nginx_conf/* /etc/nginx/conf.d/
COPY --chown=root:nginx ./site_static/* /var/www/html/site/
