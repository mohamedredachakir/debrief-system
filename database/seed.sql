TRUNCATE users, classes, sprints, briefs, competences, evaluations, submissions RESTART IDENTITY CASCADE;

INSERT INTO classes (name) VALUES
('DWWM-2026-A'),
('DWWM-2026-B'),
('DWWM-2026-C'),
('DWWM-2026-D');

INSERT INTO users (name, email, password, role, class_id) VALUES
('Admin Staff', 'admin@debrief.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL),

('Teacher One', 'teacher@debrief.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', NULL),
('Teacher Two', 'teacher2@debrief.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', NULL),
('Teacher Three', 'teacher3@debrief.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', NULL),

('Alice Johnson', 'alice@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 1),
('Bob Smith', 'bob@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 1),
('Charlie Brown', 'charlie@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 1),
('Diana Prince', 'diana@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 1),

('Eva Green', 'eva@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 2),
('Frank Miller', 'frank@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 2),
('Grace Kelly', 'grace@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 2),

('Henry Ford', 'henry@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 3),
('Ivy League', 'ivy@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 3),

('Jack Ryan', 'jack@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 4),
('Kate Winslet', 'kate@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 4),
('Leo Messi', 'leo@student.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'learner', 4);

INSERT INTO teacher_classes (teacher_id, class_id) VALUES
(2, 1), -- Teacher One teaches DWWM-2026-A
(2, 2), -- Teacher One also teaches DWWM-2026-B
(3, 3), -- Teacher Two teaches DWWM-2026-C
(4, 4); -- Teacher Three teaches DWWM-2026-D

INSERT INTO competences (code, label) VALUES
('C1', 'Maquetter une application'),
('C2', 'Réaliser une interface statique'),
('C3', 'Développer une interface dynamique'),
('C4', 'Créer une base de données'),
('C5', 'Développer les composants d''accès aux données'),
('C6', 'Développer la partie back-end'),
('C7', 'Collaborer à la gestion d''un projet informatique'),
('C8', 'Intégrer des solutions dans un environnement de production');

INSERT INTO sprints (name, start_date, duration) VALUES
('Sprint 1: Integration & HTML/CSS', '2026-01-12', 7),
('Sprint 2: PHP Basics & Sessions', '2026-01-19', 10),
('Sprint 3: Database & CRUD', '2026-01-26', 12),
('Sprint 4: MVC & Frameworks', '2026-02-09', 14),
('Sprint 5: API & Deployment', '2026-02-23', 10);

INSERT INTO class_sprint (class_id, sprint_id) VALUES
(1, 1), (2, 1), (3, 1), (4, 1),
(1, 2), (2, 2), (3, 2),
(1, 3), (2, 3),
(1, 4),
(1, 5);

INSERT INTO sprint_competences (sprint_id, competence_id) VALUES
(1, 1), (1, 2),
(2, 3), (2, 6),
(3, 4), (3, 5), (3, 6),
(4, 6), (4, 7),
(5, 7), (5, 8);

INSERT INTO briefs (title, description, duration_days, type, sprint_id) VALUES
('Personal Portfolio', 'Create a responsive personal portfolio website using HTML, CSS, and basic JavaScript.', 5, 'individuel', 1),
('Landing Page Clone', 'Clone an existing landing page and make it responsive.', 4, 'collectif', 1),
('Business Card Design', 'Design and implement a digital business card.', 3, 'individuel', 1),

('To-Do List App', 'Create a dynamic to-do list using PHP sessions.', 6, 'individuel', 2),
('Simple Blog', 'Build a basic blog system with PHP.', 8, 'collectif', 2),

('Library Management System', 'Create a database-driven library management system.', 10, 'collectif', 3),
('User Registration System', 'Build a user registration and login system with database.', 7, 'individuel', 3),

('E-commerce MVC', 'Develop an e-commerce platform using MVC pattern.', 12, 'collectif', 4),
('Task Management Tool', 'Create a project management tool with user roles.', 14, 'collectif', 4),

('REST API', 'Build a REST API for a blog system.', 8, 'individuel', 5),
('Full Stack Application', 'Deploy a complete web application to production.', 10, 'collectif', 5);

INSERT INTO submissions (learner_id, brief_id, project_link, comments, submitted_at) VALUES
(3, 1, 'https://github.com/alicejohnson/portfolio', 'I created a responsive portfolio with HTML, CSS, and JavaScript. Features include a contact form and project showcase.', '2026-01-15 10:30:00'),
(3, 4, 'https://github.com/alicejohnson/todo-app', 'Dynamic to-do list with PHP sessions. Includes add, edit, delete, and mark as complete functionality.', '2026-01-22 14:15:00'),
(3, 6, 'https://github.com/alicejohnson/library-system', 'Database-driven library management system with CRUD operations. Used MySQL and PHP.', '2026-01-30 11:20:00'),

(4, 1, 'https://github.com/bobsmith/personal-site', 'Clean and modern portfolio design. Used CSS Grid and Flexbox for responsive layout.', '2026-01-16 09:45:00'),
(4, 2, 'https://github.com/bobsmith/landing-page', 'Cloned a popular SaaS landing page. Made it fully responsive and added smooth animations.', '2026-01-17 16:20:00'),
(4, 4, 'https://github.com/bobsmith/php-blog', 'Simple blog system with user authentication and post management.', '2026-01-24 13:45:00'),

(5, 1, 'https://github.com/charliebrown/digital-card', 'Digital business card with flip animation. Includes contact info and social links.', '2026-01-14 11:00:00'),
(5, 3, 'https://github.com/charliebrown/user-system', 'User registration and login system with secure password hashing.', '2026-01-28 10:15:00'),

(6, 1, 'https://github.com/dianaprince/web-portfolio', 'Portfolio with dark mode toggle and smooth scrolling. Showcases various projects and skills.', '2026-01-15 13:25:00'),
(6, 4, 'https://github.com/dianaprince/task-manager', 'PHP task manager with session handling. Features user authentication and task categories.', '2026-01-23 10:45:00'),
(6, 5, 'https://github.com/dianaprince/ecommerce-mvc', 'E-commerce platform built with MVC pattern. Includes shopping cart and payment integration.', '2026-02-15 09:30:00'),

(7, 1, 'https://github.com/evagreen/responsive-portfolio', 'Responsive portfolio with mobile-first design. Includes a blog section and contact form.', '2026-01-16 12:30:00'),
(7, 4, 'https://github.com/evagreen/session-blog', 'Blog system using PHP sessions for user management and content creation.', '2026-01-25 14:20:00'),

(8, 1, 'https://github.com/frankmiller/dev-portfolio', 'Developer portfolio showcasing web development projects with modern design.', '2026-01-17 15:10:00'),
(8, 2, 'https://github.com/frankmiller/marketing-landing', 'Cloned a marketing landing page with improved accessibility and performance.', '2026-01-18 11:45:00'),
(8, 6, 'https://github.com/frankmiller/book-manager', 'Library management system with search, borrow, and return functionality.', '2026-02-01 16:30:00'),

(9, 1, 'https://github.com/gracekelly/portfolio-2026', 'Personal portfolio with project gallery and contact integration.', '2026-01-17 08:55:00'),
(9, 4, 'https://github.com/gracekelly/todo-list', 'Advanced to-do list with categories, priorities, and due dates.', '2026-01-26 12:10:00'),

(10, 1, 'https://github.com/henryford/dev-portfolio', 'Developer portfolio with project filtering and detailed case studies.', '2026-01-15 08:20:00'),
(10, 4, 'https://github.com/henryford/content-blog', 'Content management blog with admin panel and user comments.', '2026-01-27 09:45:00'),

(11, 1, 'https://github.com/ivyleague/web-developer-site', 'Web developer portfolio with project showcase and skill highlights.', '2026-01-16 14:15:00'),

(12, 1, 'https://github.com/jackryan/portfolio-site', 'Minimalist portfolio design focusing on user experience and performance.', '2026-01-16 14:50:00'),
(12, 4, 'https://github.com/jackryan/php-blog-system', 'Complete blog system with user management and content publishing.', '2026-01-28 11:25:00'),

(13, 1, 'https://github.com/katewinslet/designer-portfolio', 'Designer portfolio with case studies and project presentations.', '2026-01-17 10:40:00'),

(14, 1, 'https://github.com/leomessi/sports-portfolio', 'Portfolio website with sports theme and interactive elements.', '2026-01-17 13:20:00'),
(14, 4, 'https://github.com/leomessi/task-tracker', 'Project management tool with team collaboration features.', '2026-01-29 15:50:00');
