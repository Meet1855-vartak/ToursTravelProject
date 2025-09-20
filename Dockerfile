# Use official PHP image
FROM php:8.2-cli

# Install PostgreSQL extension and dependencies
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql

# Copy project files
WORKDIR /var/www/html
COPY . .

# Expose port
EXPOSE 10000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
