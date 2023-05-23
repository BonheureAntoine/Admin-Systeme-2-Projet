FROM ubuntu:latest

MAINTAINER Alassane Wone <a.wone@students.ephec.be>

RUN apt-get update && apt-get install -y nmap mutt telnet net-tools

EXPOSE 25/tcp

EXPOSE 110/tcp

EXPOSE 143/tcp

CMD ["mutt"]
