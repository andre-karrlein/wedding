PHP_BIN = php
COMPOSER = ./composer.phar

default: install

install:
	$(PHP_BIN) $(COMPOSER) install

startup-test:
	docker-compose -f docker-compose.yml -f docker-compose.test.yml up --build -d

startup-live:
	docker-compose -f docker-compose.yml -f docker-compose.live.yml up --build -d
