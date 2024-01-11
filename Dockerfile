FROM debian:bookworm-slim

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt-get -y install git zip unzip curl
RUN apt-get -yq install php sqlite3
RUN apt-get -yq install php-cli php-curl php-mysql php-sqlite3 php-xml php-mbstring
#RUN apt-get -yq install nodejs npm
RUN apt-get -yq install wget

RUN wget https://getcomposer.org/installer
RUN php installer --install-dir=/usr/local/bin --filename=composer

RUN mkdir app
VOLUME [ "/app" ]
WORKDIR /app
COPY . .

RUN mv .env-docker.example .env
RUN composer install
RUN touch database/database.sqlite
RUN php artisan migrate
RUN mkdir storage/app/public/cars
RUN php artisan db:seed
RUN php artisan key:generate

EXPOSE 8000

ENTRYPOINT ["php", "artisan", "serve", "--host=0.0.0.0"]