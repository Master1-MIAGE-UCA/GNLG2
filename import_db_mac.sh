#!/bin/zsh
db_user="root"
db_name="test"
db_pass="root"

echo "Importing sql files to laravel MySQL database ..."
mysql -u ${db_user} --password=${db_pass} -e "CREATE DATABASE ${db_name}"
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_user3.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_div3.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_log.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_mar3-2.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_mar3.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_metadb.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_metalg.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_mgrplg.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_nai3.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_params.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_prenom.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_sums.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_traceip.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_user3.sql
mysql -u ${db_user} --password=${db_pass} ${db_name} < db/act_geoloc.sql