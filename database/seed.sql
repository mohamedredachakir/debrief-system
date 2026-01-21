-- Clean slate
TRUNCATE users, classes, sprints, briefs, competences, evaluations RESTART IDENTITY CASCADE;

-- Classes
INSERT INTO classes (name) VALUES ('DWWM-2026-A'), ('DWWM-2026-B');

-- Users
INSERT INTO users (name, email, password, role, class_id) VALUES 
('Admin Staff', 'admin@debrief.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL),
('Teacher One', 'teacher@debrief.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', NULL),
('Alice Learner', 'alice@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 1),
('Bob Learner', 'bob@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 1),
('Charlie Learner', 'charlie@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 1);

-- Sprints (No class_id)
INSERT INTO sprints (name, start_date, duration) VALUES 
('Sprint 1: Integration', '2026-01-12', 5),
('Sprint 2: PHP Basics', '2026-01-19', 10);

-- Assign Sprints to Classes (Pivot)
INSERT INTO class_sprint (class_id, sprint_id) VALUES
(1, 1), -- Class 1 has Sprint 1
(1, 2); -- Class 1 has Sprint 2

-- Competences
INSERT INTO competences (code, label) VALUES
('C1', 'Maquetter une application'),
('C2', 'Réaliser une interface statique'),
('C3', 'Développer une interface dynamique'),
('C4', 'Créer une base de données'),
('C5', 'Développer les composants d''accès aux données'),
('C6', 'Développer la partie back-end');

-- Assign Competences to Sprints (Pivot)
INSERT INTO sprint_competences (sprint_id, competence_id) VALUES
(1, 1), (1, 2), -- Sprint 1 covers C1, C2
(2, 3), (2, 6); -- Sprint 2 covers C3, C6

-- Briefs
INSERT INTO briefs (title, description, duration_days, type, sprint_id) VALUES
('Portfolio', 'Create your personal portfolio using HTML/CSS only.', 3, 'individuel', 1),
('Landing Page', 'Clone a landing page of your choice.', 2, 'collectif', 1),
('To-Do List', 'Create a dynamic To-Do list using PHP Session.', 4, 'individuel', 2);

-- Assign Class 1 to Learners
UPDATE users SET class_id = 1 WHERE role = 'learner';
