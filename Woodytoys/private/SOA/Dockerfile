FROM ubuntu/bind9

RUN apt-get update
RUN apt-get install dnsutils -y
RUN apt-get install nano -y

MAINTAINER Euan Cockburn <e.cockburn@students.ephec.be>

COPY named.conf /etc/bind
COPY woodytoys.internal.zone /etc/bind

CMD ["ls", "/etc/bind"]
CMD ["named"]
