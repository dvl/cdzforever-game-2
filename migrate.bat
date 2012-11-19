@echo off
c:\nginx\php\php c:\nginx\html\laravel\artisan migrate:install --env=local
c:\nginx\php\php c:\nginx\html\laravel\artisan migrate --env=local