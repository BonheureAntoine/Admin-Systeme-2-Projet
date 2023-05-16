FROM ubuntu/bind9

MAINTAINER Euan Cockburn <e.cockburn@students.ephec.be>

COPY named.conf /etc/bind
COPY m2-2.ephec-ti.be.zone /etc/bind

CMD ["ls", "/etc/bind"]
CMD ["named"]
