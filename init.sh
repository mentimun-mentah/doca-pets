sudo apt-get update
sudo apt -y install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php7.3
sudo apt-get install php7.3 php7.3-cli php7.3-common php7.3-json php7.3-opcache php7.3-mysql php7.3-mbstring php7.3-mcrypt php7.3-zip php7.3-fpm php7.3-xml
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer create-project laravel/laravel src --prefer-dist "8.*"
