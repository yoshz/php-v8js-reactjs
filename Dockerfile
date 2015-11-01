FROM yoshz/php-v8js:5.5

# Create app folder
RUN mkdir -p /app/web
WORKDIR /app

# Start internal web server
EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80", "-t", "/app/web"]
