FROM ubuntu:latest

MAINTAINER Alassane Wone <a.wone@students.ephec.be>

RUN apt-get update && apt-get install -y postfix

RUN apt install -y dovecot-imapd dovecot-pop3d dovecot-core

COPY main.cf /etc/postfix/

COPY dovecot.conf /etc/dovecot/

RUN adduser contact

RUN apt-get install -y nmap net-tools telnet

EXPOSE 25/tcp 

EXPOSE 110/tcp

EXPOSE 143/tcp

CMD ["postfix", "start"]

CMD ["service", "dovecot", "start"]
