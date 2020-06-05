# Project

## From scratch

```
composer create-project symfony/website-skeleton cdstest
cd cdstest
composer require --dev phpunit
composer require logger
```

## Run tests

```
mkdir -p reports/web-coverage
bin/phpunit \
    --log-junit reports/web-phpunit.xml \
    --coverage-clover reports/web-clover.xml \
    --coverage-html reports/web-coverage
```
