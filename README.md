Bolt API documentation
======================

Find the live version of the output at: https://api-docs.boltcms.io/

This is a small repository to create the API docs for Bolt 4.

## Usage

First, clone this repo, and go into the newly created folder. Then:

```bash
composer install
git clone git@github.com:bolt/core.git
rm -rf core/var/cache/*
php vendor/bin/doctum.php update config.php
```

The `build/` folder will now contain the latest version of the built docs.

## Deployment

If you're me, and reading this anytime in the near future: Here's how to deploy
the output:

```bash
scp -r build/* bolt@boltcms.io:./domains/api-docs.boltcms.io/public_html/
```
