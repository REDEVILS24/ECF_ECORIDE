FROM php:8.1-apache

# Mettre à jour les packages et installer les dépendances
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# MongoDB extension et driver
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb
# Installer l'extension APCu
RUN pecl install apcu \
    && docker-php-ext-enable apcu

# Activer mod_rewrite pour Apache
RUN a2enmod rewrite

# Configuration Apache
RUN echo '<Directory /var/www/html/>' >> /etc/apache2/apache2.conf && \
    echo '    Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf && \
    echo '    AllowOverride All' >> /etc/apache2/apache2.conf && \
    echo '    Require all granted' >> /etc/apache2/apache2.conf && \
    echo '</Directory>' >> /etc/apache2/apache2.conf

# Copier le projet
COPY . /var/www/html/

# Installer les dépendances MongoDB après la copie
WORKDIR /var/www/html
RUN composer require mongodb/mongodb

# Permissions
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

EXPOSE 80