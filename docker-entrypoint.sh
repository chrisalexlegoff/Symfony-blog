#!/bin/sh

if [ -z "$(ls -A 'vendor/' 2>/dev/null)" ]; then
    XDEBUG_MODE=off composer install --prefer-dist --no-progress --no-interaction && symfony serve
else
    rm -Rf vendor/
    XDEBUG_MODE=off composer install --prefer-dist --no-progress --no-interaction && symfony serve
fi
