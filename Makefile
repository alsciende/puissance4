all: install test

install:
	composer diagnose
	composer validate
	composer install

test:
	vendor/bin/phpstan analyse src tests --level=max
	bin/phpunit
