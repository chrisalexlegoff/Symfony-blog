#!/usr/bin/env bash

if [[ "$1" == apache2* ]] || [ "$1" = 'php-fpm' ]; then
    if [ ! -e /var/www/html/public/index.php ]; then
        if [ -n "$SYMFONY_PARAMS" ]; then
            echo "CREATING PROJECT with params: /usr/bin/symfony new /var/www/html $SYMFONY_PARAMS"
            cd /var/www/html && composer create-project "symfony/skeleton $SYMFONY_PARAMS"
        else
            echo "CREATING PROJECT with std-params: /usr/bin/symfony new /var/www/html $SYMFONY_PARAMS_STD"
            cd /var/www/html && composer create-project "symfony/skeleton $SYMFONY_PARAMS_STD"
        fi
    else
        if [ ! -e /var/www/html/vendor ]; then
            echo "INSTALLING DEPENDENCIES with composer install"
            cd /var/www/html && composer install
        fi
    fi
fi

echo "STARTING APACHE"

exec "$@"
