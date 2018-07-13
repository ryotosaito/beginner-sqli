FROM nginx

ADD nginx/beginner-sqli.conf /etc/nginx/conf.d/default.conf
ADD nginx/challenges.conf /etc/nginx/conf.d/challenges.conf
