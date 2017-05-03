FROM ubuntu

#Generic installaion
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y nginx curl nodejs npm sudo build-essential screen nano dos2unix htop git zip unzip wget apache2

#Add User so composer doesnt scream at you
#RUN useradd -m -U basic -G www-data -s /bin/bash

#Get PhP
RUN apt-get install -y php7.0 php7.0-curl php7.0-pgsql php7.0-fpm php7.0-mbstring php7.0-mcrypt php7.0-dom libapache2-mod-php7.0
#COPY php.ini /etc/php/7.0/cli

RUN a2enmod php7.0
RUN a2enmod rewrite

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

CMD /usr/sbin/apache2ctl -D FOREGROUND

RUN wget https://phar.phpunit.de/phpunit.phar
RUN chmod +x phpunit.phar
RUN mv phpunit.phar /usr/local/bin/phpunit

#Get Node
RUN curl -sL https://deb.nodesource.com/setup_7.x | bash -
RUN apt-get update -y
RUN apt-get install -y nodejs
RUN npm rebuild node-sass --force

#Get Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer

#Copy root and execute commands
COPY ./ /var/www/html/Shift-API

#RUN chown -R basic:www-data /var/www
#RUN cd /var/www/Shift-API

RUN cd /var/www/html/Shift-API && composer install
RUN cd /var/www/html/Shift-API && npm install
RUN cd /var/www/html/Shift-API && npm install moment

RUN dos2unix /var/www/html/Shift-API/start.sh
CMD bash /var/www/html/Shift-API/start.sh && htop
