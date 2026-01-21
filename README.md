# Debrief System

A comprehensive school/learning management system built with PHP 8, MVC architecture, and PostgreSQL.

## Features

*   **Role-Based Access Control**: Admin, Teacher, and Learner roles.
*   **Class Management**: Create and manage classes.
*   **Sprint Management**: Create sprints that can be assigned to multiple classes (Many-to-Many).
*   **Competence Tracking**: Link competences to sprints and track learner progress.
*   **Briefs & Submissions**: Teachers create briefs; learners submit work.
*   **Evaluation System**: Teachers evaluate learner submissions based on specific competences (Imiter, S'adapter, Transposer).
*   **Dockerized**: Fully containerized with Docker and Docker Compose.
*   **Modern UI**: "Magical Design" with glassmorphism and animated backgrounds.

## Technical Stack

*   **Backend**: PHP 8.2+
*   **Database**: PostgreSQL
*   **Architecture**: Custom MVC (Model-View-Controller)
*   **Templating**: BladeOne (Blade template engine for PHP)
*   **Frontend**: Vanilla CSS3 (Custom "Magical" Design System)
*   **Dependency Management**: Composer

## Installation & Setup

1.  **Clone the repository:**
    ```bash
    git clone git@github.com:mohamedredachakir/debrief-system.git
    cd debrief-system
    ```

2.  **Start with Docker Compose:**
    ```bash
    docker-compose up -d --build
    ```

3.  **Initialize Database:**
    The database schema and seed data are located in `database/`. You can initialize them by running:
    ```bash
    cat database/schema.sql | docker compose exec -T db psql -U postgres -d debrief_db
    cat database/seed.sql | docker compose exec -T db psql -U postgres -d debrief_db
    ```

4.  **Access the Application:**
    Open your browser and navigate to: `http://localhost:8080`

## Default Credentials

*   **Admin**: `admin@debrief.com` / `password`
*   **Teacher**: `teacher@debrief.com` / `password`
*   **Learner**: `alice@student.com` / `password`

## Project Structure

*   `app/`: Core application logic (Controllers, Models, Services, Repositories).
*   `config/`: Configuration files.
*   `database/`: SQL schema and seed files.
*   `public/`: Public entry point `index.php` and assets (CSS, JS).
*   `routes/`: Route definitions.
*   `views/`: Blade templates.
*   `storage/`: Cache and views compilation.

