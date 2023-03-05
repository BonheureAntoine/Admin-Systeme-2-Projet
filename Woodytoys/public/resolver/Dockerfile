FROM ubuntu/bind9

MAINTAINER Alassane Wone <a.wone@students.ephec.be>

COPY named.conf /etc/bind/

EXPOSE 53/udp
EXPOSE 53/tcp

CMD ["named", "-g"]

