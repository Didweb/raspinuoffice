build:
	docker-compose build
start:
	docker-compose up -d
stop:
	docker-compose down
bash:
	docker-compose -f docker-compose.yml run php /bin/bash
mysql:
	docker-compose -f docker-compose.yml run mysql /bin/bash
nginx:
	docker-compose -f docker-compose.yml run nginx /bin/bash
info:
	docker ps
psalm:
	./vendor/bin/psalm
phpunit:
	./vendor/bin/phpunit --colors=always -v
alltests:
	./vendor/bin/psalm
	@echo '  '
	./vendor/bin/phpunit --colors=always -v



