#!/bin/bash

docker build -t $1 .

docker run -p 25:25 -p 143:143 -p 110:110 -d --name $2 $1
