@echo off
>batlog.txt (
	php artisan schedule:run
	php artisan telescope:prune --hours=48
)
