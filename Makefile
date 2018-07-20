PHONY: build init test phpunit

# Docker
DR=docker run -it --rm --name php -v "$(shell pwd)":/var/www/html php-image:5.6

build:
	docker build --pull --build-arg DEV_USERNAME=$(shell id -un) --build-arg DEV_UID=$(shell id -u) -t php-image:5.6 .

init: build
	$(DR) composer install

phpunit:
	$(DR) php ./vendor/bin/phpunit --color tests

test: init phpunit
