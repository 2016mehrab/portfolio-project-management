# Portfolio Projects – CRUD Application

A Laravel 12 application for managing portfolio projects with full CRUD operations, built with Bootstrap 5 and PostgreSQL in a fully Dockerized environment.

## Laravel Version
- Laravel 12.14.1

## Setup Instructions

Follow these steps to set up and run the application using Docker.

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/2016mehrab/portfolio-projects-crud-application
   cd portfolio-projects-crud-application
   ```

2 **Ports**:
  - Ensure the following ports are available:
    - `8000` (Web)
    - `5432` (PostgreSQL)
    - `8889` (Adminer)

2. **Set Up Environment**:
   - Create a Docker Compose `.env` file using this command:
     ```bash
     echo -e "DB_PORT=5432\nDB_HOST=db\nDB_DATABASE=portfolio-management\nDB_USERNAME=postgres\nDB_PASSWORD=secret" > .env
     ```
   - Verify that `.env.example` in the project directory contains :
     ```env
     DB_CONNECTION=pgsql
     DB_HOST=db
     DB_PORT=5432
     DB_DATABASE=portfolio-management
     DB_USERNAME=postgres
     DB_PASSWORD=secret
     ```
   - **Note**: Ensure `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_HOST`, and `DB_PASSWORD` match between the `.env` and `.env.example` files.

3. **Start Docker**:
   - Build and run the services:
     ```bash
     docker compose up --build
     ```
   - **Note**: The first build may take a few minutes, depending on your internet speed.
   - This command builds the `app` service (PHP), starts the PostgreSQL database (`db`), and runs Adminer.

4. **Access the Application**:
   - Website: `http://localhost:8000`
   - Adminer: `http://localhost:8889` (server: `db`, user: `postgres`, password: `secret`, database: `portfolio-management`)

<!-- 5. **Verify Setup (Optional)**:
   - Check database migrations:
     ```bash
     docker exec laravel-portfolio-crud-app-1 php artisan migrate:status
     ```
   - View container logs:
     ```bash
     docker compose logs app
     ``` -->

## Additional Notes
- **Features**:
  - Full CRUD operations for projects (Title, Description, Project URL, Image, Status: draft/published).
  - Projects with a `URL` and a `published` status display a "Visit" button.
  - Image uploads support up to 2MB (JPEG, PNG, JPG).
  - Clicking on an individual project card shows its details, with options to edit or delete the project.