help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  build            docker compose build --no-cache"
	@echo "  up               docker compose up -d"
	@echo "  down             docker compose down"
	@echo "  flogs            docker -f logs php"
	@echo "  logs             docker logs php"

build:
	@docker-compose --env-file .docker.env build --no-cache

up:
	@docker-compose --env-file .docker.env up -d

down:
	@docker compose --env-file .docker.env down

restart:
	@docker compose --env-file .docker.env down
	@docker compose --env-file .docker.env up -d

flogs:
	@docker logs -f php

logs:
	@docker logs php
