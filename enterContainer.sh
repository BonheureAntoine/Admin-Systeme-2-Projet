#!/bin/bash

docker build -t $1 .

docker run -ti --name $2 $1 sh
