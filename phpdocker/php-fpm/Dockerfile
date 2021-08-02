FROM phpdockerio/php74-fpm:latest
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php7.4-bcmath \ 
        php7.4-dba \ 
        php7.4-intl \ 
        php7.4-mysql \ 
        php7.4-odbc; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
