help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  build            docker compose build --no-cache"
	@echo "  up               docker compose up -d"
	@echo "  down             docker compose down"

build:
	@docker-compose --env-file .docker.env build --no-cache

up:
	@docker-compose --env-file .docker.env up -d

down:
	@docker compose --env-file .docker.env down
