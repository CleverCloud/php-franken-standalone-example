#!/bin/bash

FPHP_VER="1.1.0"
FPHP_URL="https://github.com/dunglas/frankenphp/releases/download/v${FPHP_VER}/frankenphp-linux-x86_64"

echo "Downloading FrankenPHP..."
wget -q ${FPHP_URL} -O fphp
echo -e "Downloading FrankenPHP: \033[32m✔\033[0m"

chmod +x fphp
echo -e "Setting permissions: \033[32m✔\033[0m"
