all: install test

install:
	composer diagnose
	composer validate
	composer install

test: phpstan phpunit

phpstan:
	vendor/bin/phpstan analyse tests
	vendor/bin/phpstan analyse src --level=max

phpunit:
	bin/phpunit
