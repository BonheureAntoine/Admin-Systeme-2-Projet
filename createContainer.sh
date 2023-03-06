#!/bin/bash

docker build -t $1 .

docker run -d --name $2 $1
