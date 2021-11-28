# pachinko

## Getting started

## Prerequisites

- MariaDB 10.4
- php 7.4.1 (with pdo_mysql)

## Installing

- Rename ``.sample.env`` to ``.env.json``

**PHP Built-in webserver**:

- Import ``pachinko.sql`` to your database
- ``php -S 0.0.0.0:8000 -t public``

**Docker**:

``docker-compose up``

---

**PS**: If you want to use your local install of nginx instead update the nginx main configuration according to the ``nginx.conf``.
