#!/bin/bash

URL="https://improved-robot-p4jg6w5rqx9f6x9j-8000.app.github.dev/api/login/" 

echo "Fetching data from $URL..."

curl -i -X POST "$URL" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d "{\"email\": \"john@example.com\", \"password\": \"000000\"}"

echo -e "\ndone"