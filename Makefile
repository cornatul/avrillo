#!/bin/sh
build:
	docker image rm -f cornatul/avrillo && docker build -t cornatul/avrillo --no-cache --progress=plain . --build-arg CACHEBUST=$(date +%s)
up:
	docker-compose -f docker-compose.yml up  --remove-orphans
stop:
	docker-compose down
ssh:
	docker exec -it avrillo /bin/bash