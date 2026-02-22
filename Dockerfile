FROM php:8.2-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# ตั้งค่าภาษาไทยและโซนเวลา
RUN apt-get update && apt-get install -y locales tzdata \
    && sed -i -e 's/# th_TH.UTF-8 UTF-8/th_TH.UTF-8 UTF-8/' /etc/locale.gen \
    && dpkg-reconfigure --frontend=noninteractive locales \
    && ln -snf /usr/share/zoneinfo/Asia/Bangkok /etc/localtime && echo Asia/Bangkok > /etc/timezone
