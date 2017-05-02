FROM ubuntu

#Generic installaion
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y nginx curl nodejs npm sudo build-essential screen nano dos2unix htop git zip unzip wget

#Add User so composer doesnt scream at you
#RUN useradd -m -U basic -G www-data -s /bin/bash

#Get PhP
RUN apt-get install -y php7.0 php7.0-curl php7.0-pgsql php7.0-fpm php7.0-mbstring php7.0-mcrypt php7.0-dom
COPY php.ini /etc/php/7.0/cli

RUN wget https://phar.phpunit.de/phpunit.phar
RUN chmod +x phpunit.phar
RUN mv phpunit.phar /usr/local/bin/phpunit

#Get Node
RUN curl -sL https://deb.nodesource.com/setup_7.x | bash -
RUN apt-get update -y
RUN apt-get install -y nodejs

#Get Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer

#Copy root and execute commands
COPY ./ /var/www/html/Shift-API

#RUN chown -R basic:www-data /var/www
#RUN cd /var/www/Shift-API 

RUN cd /var/www/html/Shift-API && composer install 
RUN cd /var/www/html/Shift-API && npm install

RUN dos2unix /var/www/html/Shift-API/start.sh
CMD bash /var/www/html/Shift-API/start.sh && htop
