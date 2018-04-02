install:
		composer install
make lint:
		composer run-script phpcs -- --standard=PSR2 app bootstrap public routes storage
run:
		php -S localhost:8000 -t public
logs:
		tail -f storage/logs/lumen.log
test:
		composer run-script phpunit

.PHONY: test
