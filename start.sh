mv /var/www/html/Shift-API/.env.example /var/www/html/Shift-API/.env
cd /var/www/html/Shift-API && php artisan key:generate
cd /var/www/html/Shift-API && screen -S Shift-API -d -m npm run dev
cd /var/www/html/Shift-API && screen -S Shift-API -d -m php -S 0.0.0.0:8080 -t public/
cd /var/www/html/Shift-API && screen -S Shift-API -d -m php artisan migrate
