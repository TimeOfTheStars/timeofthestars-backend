#!/bin/bash

set -e

DB_HOST="${DB_HOST:-user_service_db}"
DB_PORT="${DB_PORT:-5433}"

echo "Waiting for PostgreSQL at $DB_HOST:$DB_PORT..."
until pg_isready -h "$DB_HOST" -p "$DB_PORT" -q; do
  sleep 1
done
echo "PostgreSQL is ready."

#echo "Running Alembic migrations..."
#alembic upgrade head || { echo "Alembic migration failed"; exit 1; }

echo "Starting application..."

exec uvicorn main:app --host 0.0.0.0 --port 8002 --reload --proxy-headers --server-header --reload-dir app
