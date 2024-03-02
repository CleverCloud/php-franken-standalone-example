# FrankenPHP standalone demo on Clever Cloud

This is a simple demo of how to deploy FrankenPHP standalone binary to serve a PHP application running on Clever Cloud.  You'll need a [Clever Cloud account](https://console.clever-cloud.com/) and [Clever Tools](https://github.com/CleverCloud/clever-tools).

## Setup Clever Tools

```bash
npm i -g clever-tools
clever login
```

## Init the project

```bash
git clone https://github.com/davlgd/frankenphp-standalone-demo
cd frankenphp-standalone-demo
```

## Create the application and deploy on Clever Cloud

Here we use the Node.js runtime on Clever Cloud, as it doesn't include a default web server. `CC_PRE_RUN_HOOK` environment variable is used to download FrankenPHP binary (including Caddy). `package.json` is to start the application with FrankenPHP `php-server` command.

```bash
clever create -t node
clever env import < .env
git add . && git commit -m "Initial commit"
clever deploy
clever open
```

You can now visit the website or send a request with `?json=ENCODED_JSON` in the URL to `/api.php` to check if it's a valid JSON. This demo uses some new features of PHP 8.3.

