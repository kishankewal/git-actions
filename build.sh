#!/bin/bash

echo "🚀 Starting deployment..."

cd ~/app

echo "📥 Pulling latest code..."
git pull origin main

echo "🐳 Rebuilding containers..."
docker-compose down
docker-compose up -d --build

echo "🧹 Clearing Laravel cache..."
docker exec laravel_app php artisan config:clear
docker exec laravel_app php artisan cache:clear
docker exec laravel_app php artisan route:clear

echo "✅ Deployment completed!"