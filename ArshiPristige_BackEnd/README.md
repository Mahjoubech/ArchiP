# ArshiPristige Backend API

A Laravel-based API for connecting clients with architects for architectural projects.

## 🏗️ System Overview

ArshiPristige is a platform that connects:
- **Clients** - who need architectural services
- **Architects** - who provide architectural services  
- **Admins** - who manage the platform

## 🎯 User Roles

### Client
- Create and manage projects
- Review and accept/reject proposals from architects
- Manage profile and company information

### Architect
- Browse available projects
- Submit proposals for projects
- Manage portfolio and professional information
- Requires admin verification before accessing the platform

### Admin
- Verify architect accounts
- Manage categories and projects
- View platform statistics
- Manage all users

## 🚀 Getting Started

### Prerequisites
- PHP 8.1+
- Composer
- PostgreSQL/MySQL
- Laravel 10+

### Installation

1. **Clone the repository**
```bash
git clone <repository-url>
cd ArshiPristige_BackEnd
```

2. **Install dependencies**
```bash
composer install
```

3. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database**
Edit `.env` file with your database credentials:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=arshipristige
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **Run migrations and seeders**
```bash
php artisan migrate:fresh --seed
```

6. **Start the server**
```bash
php artisan serve
```

The API will be available at `http://localhost:8000`

## 📋 API Endpoints

### Authentication
- `POST /api/login` - User login
- `POST /api/register/client` - Register as client
- `POST /api/register/architect` - Register as architect
- `POST /api/logout` - User logout (authenticated)
- `GET /api/auth-status` - Check authentication status (authenticated)

### Public Endpoints
- `GET /api/projects` - Get all projects
- `GET /api/projects/featured` - Get featured projects
- `GET /api/projects/search` - Search projects
- `GET /api/projects/{id}` - Get project by ID
- `GET /api/categories` - Get all categories
- `POST /api/contact` - Send contact message

### Client Endpoints (authenticated)
- `POST /api/projects` - Create new project
- `GET /api/client/projects` - Get client's projects
- `PUT /api/projects/{id}` - Update project
- `DELETE /api/projects/{id}` - Delete project
- `PUT /api/proposals/{id}/status` - Accept/reject proposal
- `GET /api/client/profile` - Get client profile
- `PUT /api/client/profile` - Update client profile

### Architect Endpoints (authenticated)
- `POST /api/projects/{id}/proposals` - Submit proposal
- `GET /api/architect/proposals` - Get architect's proposals
- `GET /api/architect/profile` - Get architect profile
- `PUT /api/architect/profile` - Update architect profile

### Admin Endpoints (authenticated)
- `GET /api/admin/architects` - Get all architects
- `GET /api/admin/clients` - Get all clients
- `PUT /api/admin/architects/{id}/verify` - Verify architect account
- `POST /api/admin/categories` - Create category
- `PUT /api/admin/categories/{id}` - Update category
- `DELETE /api/admin/categories/{id}` - Delete category
- `GET /api/admin/statistics` - Get platform statistics

## 🔐 Authentication

The API uses Laravel Sanctum for authentication. Include the bearer token in the Authorization header:

```
Authorization: Bearer {your-token}
```

## 📊 Database Schema

### Users Table
- Basic user information (name, email, password, role)
- Profile data (phone, address, photo, etc.)

### Clients Table
- Company information
- Business preferences
- Verification status

### Architects Table
- Professional information (license, experience, specializations)
- Portfolio and social links
- Verification status and rating

### Projects Table
- Project details (title, description, budget, deadline)
- Client and assigned architect
- Status and category

### Proposals Table
- Architect proposals for projects
- Budget and timeline estimates
- Status (pending, accepted, rejected)

### Categories Table
- Project categories (Residential, Commercial, etc.)
- Icons and colors for UI

## 🧪 Testing

### Default Users

After seeding, the following users are available:

**Admin**
- Email: `admin@arshipristige.com`
- Password: `admin123`

**Test Users**
- Email: `admin@example.com` / Password: `password`
- Email: `architect@example.com` / Password: `password`
- Email: `client@example.com` / Password: `password`

## 🔧 Development

### Adding New Features
1. Create migrations for database changes
2. Update models with relationships and fillable fields
3. Create controllers for business logic
4. Add routes with proper middleware
5. Test endpoints

### Code Style
Follow Laravel conventions and PSR-12 coding standards.

## 📝 License

This project is proprietary software.

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests
5. Submit a pull request

## 📞 Support

For support, contact the development team.
