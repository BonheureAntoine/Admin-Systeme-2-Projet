FROM ubuntu:latest

MAINTAINER Alassane Wone <a.wone@students.ephec.be>

RUN apt-get update && apt-get install -y postfix dovecot-imapd dovecot-pop3d dovecot-core

COPY main.cf /etc/postfix/

COPY dovecot.conf /etc/dovecot/

RUN adduser contact

RUN apt-get install -y nmap net-tools telnet dnsutils systemctl

# smtp (587)
EXPOSE 25/tcp 
#imap (993)
EXPOSE 143/tcp

RUN apt-get update && apt-get install -y opendkim opendkim-tools

RUN mkdir /etc/opendkim

COPY opendkim/dkimkey.private /etc/opendkim/
COPY opendkim/dkimkey.txt /etc/opendkim/

RUN systemctl start opendkim 
RUN systemctl enable opendkim 

COPY opendkim/opendkim.conf /etc/
COPY opendkim/TrustedHosts /etc/opendkim/
COPY opendkim/KeyTable /etc/opendkim/
COPY opendkim/SigningTable /etc/opendkim/

#RUN chown opendkim:opendkim dkimkey.private


#COPY start.sh /etc/
#RUN chmod +x /etc/start.sh

RUN postfix start
#RUN service dovecot start

# CMD ["exec" ,"/etc/start.sh"]
# CMD exec /etc/start.sh

#ENTRYPOINT ["/usr/sbin/postfix"] 
#CMD ["start"]
CMD cp /etc/resolv.conf /var/spool/postfix/etc/resolv.conf && postfix start-fg
#CMD /usr/sbin/postfix start && /usr/sbin/dovecot -F

# CMD ["/bin/bash", "/etc/start.sh"]

# RUN /etc/./start.sh

# RUN  /usr/sbin/postfix -c