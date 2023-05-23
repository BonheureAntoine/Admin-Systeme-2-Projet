FROM ubuntu:latest

MAINTAINER Alassane Wone <a.wone@students.ephec.be>

RUN apt-get update && apt-get install -y postfix dovecot-imapd dovecot-pop3d dovecot-core

COPY main.cf /etc/postfix/

COPY dovecot.conf /etc/dovecot/

RUN adduser contact

RUN apt-get install -y nmap net-tools telnet mutt

EXPOSE 25/tcp 

EXPOSE 143/tcp

RUN apt-get update && apt-get install -y opendkim opendkim-tools

RUN mkdir /etc/opendkim

COPY opendkim/dkimkey.private /etc/opendkim/
COPY opendkim/dkimkey.txt /etc/opendkim/

#RUN chown opendkim:opendkim dkimkey.private


#COPY start.sh /etc/
#RUN chmod +x /etc/start.sh

RUN postfix start
#RUN service dovecot start

RUN service opendkim start 
# RUN systemctl opendkim enable 

# CMD ["exec" ,"/etc/start.sh"]
# CMD exec /etc/start.sh

#ENTRYPOINT ["/usr/sbin/postfix"] 
#CMD ["start"]

CMD /usr/sbin/postfix start && /usr/sbin/dovecot -F

# CMD ["/bin/bash", "/etc/start.sh"]

# RUN /etc/./start.sh

# RUN  /usr/sbin/postfix -c