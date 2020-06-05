# Project

## From scratch

```
composer create-project symfony/website-skeleton cdstest
cd cdstest
composer require --dev phpunit
composer require logger
```

## Run tests manually

```
mkdir -p reports/web-coverage
bin/phpunit \
    --log-junit reports/web-phpunit.xml \
    --coverage-clover reports/web-clover.xml \
    --coverage-html reports/web-coverage
```

## CI with CDS

```
cdsctl group add devops
cdsctl project create CDSTE cdstest devops
cdsctl application create CDSTE website
cdsctl project variable add CDSTE sonarURL string https://sonar.tartarefr.eu/
cdsctl project variable add CDSTE sonarUsername string ""
cdsctl project variable add CDSTE sonarPassword string ""
cdsctl pipeline import CDSTE .cds/pipeline.json
cdsctl workflow import CDSTE .cds/workflow.json
```
