#!/bin/bash

docker stop $2

docker rm $2

docker rmi $1:latest
