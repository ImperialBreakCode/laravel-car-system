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
#COPY . .
EXPOSE 8000

ENTRYPOINT ["tail", "-f", "/dev/null"]