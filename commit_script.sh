#!/bin/bash

# Function to commit with message
commit_with_message() {
    git commit -m "$1"
    echo "Committed: $1"
}

# Add and commit new files first
echo "Committing new files..."

# Submission system files
git add app/Models/Submission.php
commit_with_message "Add Submission model for learner project submissions"

git add app/Repositories/SubmissionRepository.php
commit_with_message "Add SubmissionRepository for data access"

git add app/Services/SubmissionService.php
commit_with_message "Add SubmissionService for business logic"

# Views for submission system
git add views/learner/submit.blade.php
commit_with_message "Add learner submission form view"

git add views/teacher/view_submission.blade.php
commit_with_message "Add teacher submission viewing page"

git add views/teacher/briefs/
commit_with_message "Add teacher briefs directory structure"

# Database schema updates
git add database/schema.sql
commit_with_message "Update database schema to include submissions table"

# Routes and controllers updates
git add routes/web.php
commit_with_message "Add routes for learner submission and teacher submission viewing"

# Controller updates in batches
git add app/Controllers/LearnerController.php
commit_with_message "Update LearnerController with submission functionality"

git add app/Controllers/TeacherController.php
commit_with_message "Update TeacherController with submission viewing"

git add app/Controllers/BriefController.php
commit_with_message "Update BriefController for teacher role restrictions"

# Service updates
git add app/Services/StructureService.php
commit_with_message "Update StructureService with teacher sprint access"

git add app/Services/UserService.php
commit_with_message "Update UserService with teacher classes method"

# Repository updates
git add app/Repositories/UserRepository.php
commit_with_message "Update UserRepository with teacher classes query"

git add app/Repositories/BriefRepository.php
commit_with_message "Fix BriefRepository create method implementation"

# Model updates
git add app/Models/Brief.php
commit_with_message "Update Brief model with constructor"

git add app/Models/User.php
commit_with_message "Update User model with constructor"

git add app/Models/Sprint.php
commit_with_message "Update Sprint model with constructor"

git add app/Models/Competence.php
commit_with_message "Update Competence model with constructor"

git add app/Models/Evaluation.php
commit_with_message "Update Evaluation model with constructor"

git add app/Models/ClassModel.php
commit_with_message "Update ClassModel with constructor"

# View updates in batches
git add views/teacher/dashboard.blade.php
commit_with_message "Update teacher dashboard with sprint and brief display"

git add views/teacher/debrief.blade.php
commit_with_message "Update teacher debrief with submission viewing buttons"

git add views/learner/dashboard.blade.php
commit_with_message "Update learner dashboard with submit work buttons"

# Core system updates
git add app/Core/Database.php
commit_with_message "Update Database core with mock functionality"

git add app/Core/Controller.php
commit_with_message "Update Controller core with view method"

git add app/Core/Router.php
commit_with_message "Update Router core with routing logic"

# Admin controller updates
git add app/Controllers/AdminController.php
commit_with_message "Update AdminController with dashboard method"

git add app/Controllers/AuthController.php
commit_with_message "Update AuthController with login functionality"

git add app/Controllers/ClassController.php
commit_with_message "Update ClassController with CRUD operations"

git add app/Controllers/CompetenceController.php
commit_with_message "Update CompetenceController with CRUD operations"

git add app/Controllers/SprintController.php
commit_with_message "Update SprintController with CRUD operations"

git add app/Controllers/UserController.php
commit_with_message "Update UserController with CRUD operations"

# Service updates
git add app/Services/AuthService.php
commit_with_message "Update AuthService with authentication logic"

git add app/Services/EvaluationService.php
commit_with_message "Update EvaluationService with evaluation handling"

# Repository updates
git add app/Repositories/ClassRepository.php
commit_with_message "Update ClassRepository with class operations"

git add app/Repositories/EvaluationRepository.php
commit_with_message "Update EvaluationRepository with evaluation queries"

git add app/Repositories/SprintRepository.php
commit_with_message "Update SprintRepository with sprint operations"

git add app/Repositories/RepositoryInterface.php
commit_with_message "Update RepositoryInterface with standard methods"

# Model updates
git add app/Models/Model.php
commit_with_message "Update base Model class with query methods"

# Public files
git add public/index.php
commit_with_message "Update public index.php with application entry point"

git add public/css/style.css
commit_with_message "Update CSS styles for application theme"

# Admin views
git add views/admin/dashboard.blade.php
commit_with_message "Update admin dashboard view"

git add views/admin/classes/create.blade.php
commit_with_message "Update admin class creation view"

git add views/admin/classes/index.blade.php
commit_with_message "Update admin classes index view"

git add views/admin/competences/create.blade.php
commit_with_message "Update admin competence creation view"

git add views/admin/competences/index.blade.php
commit_with_message "Update admin competences index view"

git add views/admin/sprints/create.blade.php
commit_with_message "Update admin sprint creation view"

git add views/admin/sprints/edit.blade.php
commit_with_message "Update admin sprint editing view"

git add views/admin/sprints/index.blade.php
commit_with_message "Update admin sprints index view"

git add views/admin/users/create.blade.php
commit_with_message "Update admin user creation view"

git add views/admin/users/edit.blade.php
commit_with_message "Update admin user editing view"

git add views/admin/users/index.blade.php
commit_with_message "Update admin users index view"

git add views/admin/briefs/index.blade.php
commit_with_message "Update admin briefs index view"

git add views/admin/competences/edit.blade.php
commit_with_message "Update admin competence editing view"

git add views/admin/classes/edit.blade.php
commit_with_message "Update admin class editing view"

# Auth and home views
git add views/auth/login.blade.php
commit_with_message "Update authentication login view"

git add views/home.blade.php
commit_with_message "Update home page view"

# Layout and teacher views
git add views/layouts/app.blade.php
commit_with_message "Update application layout template"

git add views/teacher/evaluate_form.blade.php
commit_with_message "Update teacher evaluation form view"

# Config and other files
git add .gitignore
commit_with_message "Add gitignore file for version control"

git add Dockerfile
commit_with_message "Update Dockerfile for containerization"

git add docker-compose.yml
commit_with_message "Update docker-compose configuration"

git add composer.json
commit_with_message "Update composer dependencies"

git add README.md
commit_with_message "Update project documentation"

# Database seed with comprehensive data
git add database/seed.sql
commit_with_message "Add comprehensive test data with 16 users, 26 submissions, and realistic content"

# Final cleanup commits
git add clean_code.php
commit_with_message "Add clean code utility script"

git add aggressive_cleanup.php
commit_with_message "Add aggressive cleanup script"

git add cookies.txt
commit_with_message "Add cookie storage file"

git add apache-config.conf
commit_with_message "Add Apache configuration"

git add config/database.php
commit_with_message "Add database configuration"

git add .env
commit_with_message "Add environment configuration"

echo "All commits created successfully!"
