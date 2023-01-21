all: install test

install:
	composer diagnose
	composer validate
	composer install

test: phpstan phpunit

phpstan:
	vendor/bin/phpstan analyse src tests --level=max

phpunit:
	bin/phpunit
