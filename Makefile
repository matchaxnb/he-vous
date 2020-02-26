.PHONY = build push

RELEASE ?= latest

export

build:
	docker build -t registry.gitlab.com/chloetigre/he-vous/he-vous:$(RELEASE) .
	cat he-vous.swarm.yml | envsubst > deploy/he-vous.$(RELEASE).swarm.yml

push:
	docker push registry.gitlab.com/chloetigre/he-vous/he-vous:$(RELEASE)
