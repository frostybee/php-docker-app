# PHP Docker App

A simple Docker environment for vanilla PHP development with MariaDB and phpMyAdmin.

## Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Installation

### Option 1: Clone with Git

1. Clone the repository:
   ```bash
   git clone https://github.com/frostybee/php-docker-app.git my-project
   ```

2. Navigate to the project folder:
   ```bash
   cd my-project
   ```

3. Remove the `.git` folder to start fresh with your own repository:
   ```bash
   rm -rf .git
   ```

### Option 2: Download ZIP

1. Download this repository as a `.zip` file
2. Extract the folder and rename it to your project name
3. Open a terminal in the project folder

## Quick Start

1. Open a terminal in the project's root directory.

2. Start all containers by executing the following command:
   ```bash
   docker-compose up -d
   ```

3. Access the application:
   - **App:** http://localhost:8080
   - **phpMyAdmin:** http://localhost:8081

4. To stop the containers:
   ```bash
   docker-compose down
   ```

## Database Configuration

| Setting  | Value    |
| -------- | -------- |
| Host     | db       |
| Database | php_app  |
| Username | php_user |
| Password | php_pass |

**phpMyAdmin credentials:**
| Username | Password |
| -------- | -------- |
| root     | secret   |
| php_user | php_pass |

**Changing default credentials:**

To customize the database name or credentials, edit the `db` service in `docker-compose.yml`:

```yaml
db:
  environment:
    MYSQL_ROOT_PASSWORD: your_root_password
    MYSQL_DATABASE: your_database_name
    MYSQL_USER: your_username
    MYSQL_PASSWORD: your_password
```

After making changes, rebuild the containers:
```bash
docker-compose down -v
docker-compose up -d
```

## Importing Database Schema

### Option 1: Automatic Import

To automatically import a database schema when the container starts:

1. Place your `.sql` file(s) in the `docker/init-db/` folder
2. Start the containers: `docker-compose up -d`

The SQL files will be executed automatically on first container creation. If you have multiple files, they run in alphabetical order (e.g., `01-schema.sql`, `02-data.sql`).

To re-import the schema, remove the database volume and restart:
```bash
docker-compose down -v
docker-compose up -d
```

### Option 2: Using phpMyAdmin

1. Open phpMyAdmin at http://localhost:8081
2. Select the `php_app` database
3. Click the **Import** tab
4. Choose your `.sql` file and click **Import**

## Common Commands

| Action             | Command                                    |
| ------------------ | ------------------------------------------ |
| Start containers   | `docker-compose up -d`                     |
| Stop containers    | `docker-compose down`                      |
| View logs          | `docker-compose logs -f app`               |
| Run Composer       | `docker-compose exec app composer install` |
| Delete database    | `docker-compose down -v`                   |
| Rebuild containers | `docker-compose up -d --build`             |

## PHP Extensions Included

- pdo, pdo_mysql (database)
- curl (HTTP requests)
- mbstring (string handling)
- intl (internationalization)
- zip (ZIP files)
- gd (image processing)
