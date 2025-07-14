bash:
	docker exec -it app sh

#  make cron name=CreateNewsletter
cron:
	docker exec -it app ./cron.sh $(name)

up:
	docker compose up -d

down:
	docker compose down
