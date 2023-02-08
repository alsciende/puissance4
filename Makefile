all: install test

install:
	composer diagnose
	composer validate
	composer install

test: phpstan phpunit

phpstan:
	vendor/bin/phpstan analyse tests
	vendor/bin/phpstan analyse src --level=2

phpunit:
	bin/phpunit
