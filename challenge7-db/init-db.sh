#!/bin/bash

for DB in m1z0r3 system
do
	echo "CREATE DATABASE $DB;" | "${mysql[@]}"
	echo "GRANT ALL PRIVILEGES ON \`%\`.* TO \`$MYSQL_USER\`@\`%\`;" | "${mysql[@]}"
	< /tmp/$DB.sql "${mysql[@]}" -D $DB
done
