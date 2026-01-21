-- Clean up existing tables to ensure schema changes apply
DROP TABLE IF EXISTS evaluations CASCADE;
DROP TABLE IF EXISTS brief_competences CASCADE;
DROP TABLE IF EXISTS sprint_competences CASCADE;
DROP TABLE IF EXISTS competences CASCADE;
DROP TABLE IF EXISTS briefs CASCADE;
DROP TABLE IF EXISTS class_sprint CASCADE;
DROP TABLE IF EXISTS sprints CASCADE;
DROP TABLE IF EXISTS teacher_classes CASCADE;
DROP TABLE IF EXISTS classes CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TYPE IF EXISTS competence_level CASCADE;

-- Create Enum Type for Levels
CREATE TYPE competence_level AS ENUM ('IMITER', 'S_ADAPTER', 'TRANSPOSER');

-- Users Table (Admin, Teacher, Apprenant)
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL CHECK (role IN ('admin', 'teacher', 'learner')),
    class_id INT, -- For Learners. Teachers use a join table.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Classes Table
CREATE TABLE classes (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Teacher-Classes Association (Many-to-Many)
CREATE TABLE teacher_classes (
    teacher_id INT NOT NULL,
    class_id INT NOT NULL,
    PRIMARY KEY (teacher_id, class_id),
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE
);

-- Sprints Table
CREATE TABLE sprints (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    duration INT NOT NULL, -- In days
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Class-Sprint Association (Many-to-Many)
CREATE TABLE class_sprint (
    class_id INT NOT NULL,
    sprint_id INT NOT NULL,
    PRIMARY KEY (class_id, sprint_id),
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (sprint_id) REFERENCES sprints(id) ON DELETE CASCADE
);

-- Briefs Table
CREATE TABLE briefs (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    duration_days INT, -- Estimated duration
    type VARCHAR(50) CHECK (type IN ('individuel', 'collectif')),
    sprint_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sprint_id) REFERENCES sprints(id) ON DELETE CASCADE
);

-- Competences Table
CREATE TABLE competences (
    id SERIAL PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE, -- C1, C2
    label VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sprint-Competences Association (New)
CREATE TABLE sprint_competences (
    sprint_id INT NOT NULL,
    competence_id INT NOT NULL,
    PRIMARY KEY (sprint_id, competence_id),
    FOREIGN KEY (sprint_id) REFERENCES sprints(id) ON DELETE CASCADE,
    FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE
);

-- Brief-Competences Association
CREATE TABLE brief_competences (
    brief_id INT NOT NULL,
    competence_id INT NOT NULL,
    PRIMARY KEY (brief_id, competence_id),
    FOREIGN KEY (brief_id) REFERENCES briefs(id) ON DELETE CASCADE,
    FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE
);

-- Evaluations Table (Debriefing)
CREATE TABLE evaluations (
    id SERIAL PRIMARY KEY,
    learner_id INT NOT NULL,
    brief_id INT NOT NULL,
    competence_id INT NOT NULL,
    level competence_level NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    teacher_id INT, -- Who performed the evaluation
    FOREIGN KEY (learner_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (brief_id) REFERENCES briefs(id) ON DELETE CASCADE,
    FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL,
    UNIQUE(learner_id, brief_id, competence_id)
);

-- Add Foreign Key for Learners in Users table
ALTER TABLE users ADD CONSTRAINT fk_user_class FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL;

-- Initial Seed Data
INSERT INTO users (name, email, password, role) VALUES 
('Admin User', 'admin@debrief.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'); 
-- Password is 'password' (bcrypt)
