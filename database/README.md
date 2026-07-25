# Database Scripts

This folder is mapped to the MySQL container's `/docker-entrypoint-initdb.d` directory. 

Any `.sql` or `.sh` files you place in this directory will be automatically executed in alphabetical order when the MySQL container starts up **for the first time**.

You can put your table creation scripts (e.g., `schema.sql`) or initial data insertion scripts here.
