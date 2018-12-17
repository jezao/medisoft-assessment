# Medisoft Assessment
[![Build Status](https://travis-ci.com/jezao/medisoft-assessment.svg?branch=master)](https://travis-ci.com/jezao/medisoft-assessment)

## Getting started
### Running locally
**Cloning the project**
```
git clone https://github.com/jezao/medisoft-assessment.git medisoft && cd medisoft

```
**Building the project ( installing dependencies )**
Assuming that you have composer e node installed run:

```
composer install && \
composer dump-autoload && \
cp .env.example .env && \
php artisan key:generate &&  \
npm install && \
npm run production

```

**Running**
```
php  artisan serve --port=8000

```

Application should be running at: http://127.0.0.1:8000

## Demo
http://medisoft.jezao.net

## Authors

* **Jefferson Silva** - (https://github.com/jezao)
