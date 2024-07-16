default: up

up: docker_up composer_install migrate fixtures

fixtures:
	docker compose exec app sh -c 'bin/console doctrine:fixtures:load --no-interaction'

migrate:
	docker compose exec app sh -c 'bin/console doctrine:migrations:migrate --no-interaction'

composer_install:
	docker compose exec app sh -c 'composer install'

docker_up:
	docker compose up -d --build

test:
	docker compose exec app sh -c 'composer test'
