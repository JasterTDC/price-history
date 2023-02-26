COMPOSER=docker run --rm -v ${PWD}:/app -w /app composer:latest composer
IMAGE=jastertdc/php:8.2-fpm
DEVELOP=docker run --rm -v ${PWD}:/code -w /code ${IMAGE}

## Images

pull: ## Pull images
	docker pull php:8-fpm

build: ## Build images
	docker build . --tag ${IMAGE}

## Composer

composer-require: ## Install composer dependencies
	${COMPOSER} require ${args}

composer-do: ## Run composer dump-autoload
	${COMPOSER} dump-autoload

## PHP Unit

coverage: ## Run phpunit
	docker run --rm -v ${PWD}:/code -w /code ${IMAGE} /code/vendor/bin/phpunit

## Mutant test

mutant-test:
	${DEVELOP} /code/vendor/bin/infection --threads=4 --only-covered --min-msi=100 --min-covered-msi=100