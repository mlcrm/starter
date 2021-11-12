start:
	@docker-compose up -d
stop:
	@docker-compose down
build:
	@docker-compose build

show:
	@echo "==================== Containers ============================ "
	@docker ps -a
	@echo "==================== Images ================================ "
	@docker images
	@echo "==================== Networks ============================== "
	@docker network ls
schema-update:
	@docker exec -it php-fpm php bin/console doctrine:schema:update --force
fixtures:
	@docker exec -it php-fpm php bin/console doctrine:fixtures:load
entity:
	@docker exec -it php-fpm php bin/console make:entity
entity-regenerate:
	@docker exec -it php-fpm php bin/console make:entity --regenerate
