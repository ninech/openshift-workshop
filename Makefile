IMAGE_NAME=workshop

.PHONY: build run

all: build run

build:
	docker build -t $(IMAGE_NAME) .

run:
	docker stop $(IMAGE_NAME) || true
	docker run --rm --name $(IMAGE_NAME) -p 8888:80 -d $(IMAGE_NAME)

clean:
	docker stop $(IMAGE_NAME) || true
	docker rmi $(IMAGE_NAME) || true
