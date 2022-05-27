.PHONY: it
it: fix ## Perform all quality checks

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(firstword $(MAKEFILE_LIST)) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: setup
setup: vendor ## Setup the local environment

.PHONY: fix
fix: ## Fix the codestyle
	composer normalize
	vendor/bin/php-cs-fixer fix --allow-risky=yes

vendor: composer.json composer.lock ## Install dependencies through composer
	composer install
