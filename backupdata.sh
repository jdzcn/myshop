#!/bin/bash
DATE=$(date +%Y%m%d)
cd /var/www/html/myshop
rm -f *.sql
mysqldump -uroot -psongbin myshop > $DATE.sql
echo "$DATE.sql backup finished."
