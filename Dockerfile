# Use official PHP image
FROM php:8.2-cli

# Copy project files to container
WORKDIR /var/www/html
COPY . .

# Expose port 10000
EXPOSE 10000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
