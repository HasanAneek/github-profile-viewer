<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## GitHub Profile Viewer

A web application built with Laravel that allows users to authenticate with their GitHub account and view their profile information and repositories in a clean, organized interface.

## Features
- 🔐 GitHub OAuth Authentication
- 👤 User Profile Display
- 📚 Repository Listing
- 🔍 Repository Search
- 📄 Pagination Support
- 📱 Responsive Design

## Technologies Used
- Laravel 10.x - Backend Framework
- MySQL - Database
- Tailwind CSS - Styling
- GitHub API - Data Source
- Laravel Socialite - OAuth Authentication

## Prerequisites

Before begin, ensure you have met the following requirements:

- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM
- GitHub Account
- Registered GitHub OAuth Application

## Installation

1. Clone the repository
```
git clone https://github.com/your-username/github-profile-viewer.git
cd github-profile-viewer
```

2. Install dependencies
```
composer install
npm install
```
3. Create and configure environment file
```
cp .env.example .env
```
4. Configure your .env file with:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

GITHUB_CLIENT_ID=your_github_client_id
GITHUB_CLIENT_SECRET=your_github_client_secret
GITHUB_REDIRECT_URI=http://localhost:8000/auth/github/callback
```
5. Generate application key
```
php artisan key:generate
```
6. Run migrations
```
php artisan migrate
```
7. Compile assets
```
npm run dev
```
8. Start the development server
```
php artisan serve
```

## Configuration
### GitHub OAuth Setup
1. Go to GitHub Settings > Developer settings > OAuth Apps > New OAuth App
2. Fill in the following:
- Application name: GitHub Profile Viewer
- Homepage URL: http://localhost:8000
- Authorization callback URL: http://localhost:8000/auth/github/callback

## Environment Variables
### Required environment variables:
- GITHUB_CLIENT_ID
- GITHUB_CLIENT_SECRET
- GITHUB_REDIRECT_URI

## Usage
1. Visit the application URL
2. Click "Login with GitHub"
3. Authorize the application
4. View your GitHub profile and repositories
5. Use the search bar to filter repositories
6. Navigate through pages using pagination

## Key Components
### Controllers
1. GitHubController.php
- Handles GitHub OAuth authentication
- Manages user login/logout
- Processes GitHub callback

2. RepositoryController.php
- Fetches user repositories
- Implements search functionality
- Handles pagination

### Views
1. app.blade.php
- Main layout template
- Navigation bar
- Common styling

2. dashboard.blade.php
- Profile information display
- Repository listing
- Search interface
- Pagination controls

