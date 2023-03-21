FROM ubuntu/bind9

MAINTAINER Euan Cockburn <e.cockburn@students.ephec.be>

COPY named.conf /etc/bind
COPY woodytoys.lab.zone /etc/bind

CMD ["ls", "/etc/bind"]
CMD ["named"]
