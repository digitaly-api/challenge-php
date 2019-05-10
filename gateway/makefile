DIR := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

build:
	docker network inspect api-network >/dev/null || docker network create api-network
	docker-compose -f $(DIR)infrastructure/development/docker-compose.yml up --build -d
	docker exec -it api-gateway composer install
down:
	docker-compose -f infrastructure/development/docker-compose.yml down
