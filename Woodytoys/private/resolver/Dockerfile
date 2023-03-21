FROM ubuntu/bind9

COPY named.conf /etc/bind

CMD ["mkdir", "/var/log/named"]
CMD ["cd", "/etc/bind"]
CMD ["named", "-g"]
