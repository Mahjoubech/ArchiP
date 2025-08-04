# PlatformPro Backend API

A Laravel-based API for connecting people with opportunities and organizations.

## 🏗️ System Overview

PlatformPro is a platform that connects:
- **Members** - who want to find opportunities
- **Organizations** - who provide opportunities  
- **Admins** - who manage the platform

## 🎯 User Roles

### Member
- Browse and apply for opportunities
- Manage profile and skills
- Track applications and certifications

### Organization
- Create and manage opportunities
- Review and accept/reject applications
- Manage organization profile and information
- Requires admin verification before accessing the platform

### Admin
- Verify organization accounts
- Manage categories and opportunities
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
DB_DATABASE=platformpro
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
- `POST /api/register/member` - Register as member
- `POST /api/register/organization` - Register as organization
- `POST /api/logout` - User logout (authenticated)
- `GET /api/auth-status` - Check authentication status (authenticated)

### Public Endpoints
- `GET /api/opportunities` - Get all opportunities
- `GET /api/opportunities/featured` - Get featured opportunities
- `GET /api/opportunities/search` - Search opportunities
- `GET /api/opportunities/{id}` - Get opportunity by ID
- `GET /api/categories` - Get all categories
- `POST /api/contact` - Send contact message

### Member Endpoints (authenticated)
- `GET /api/member/opportunities` - Get member's applied opportunities
- `GET /api/member/profile` - Get member profile
- `PUT /api/member/profile` - Update member profile
- `POST /api/opportunities/{id}/apply` - Apply for opportunity

### Organization Endpoints (authenticated)
- `POST /api/opportunities` - Create new opportunity
- `GET /api/organization/opportunities` - Get organization's opportunities
- `PUT /api/opportunities/{id}` - Update opportunity
- `DELETE /api/opportunities/{id}` - Delete opportunity
- `PUT /api/applications/{id}/status` - Accept/reject application
- `GET /api/organization/profile` - Get organization profile
- `PUT /api/organization/profile` - Update organization profile

### Admin Endpoints (authenticated)
- `GET /api/admin/organizations` - Get all organizations
- `GET /api/admin/members` - Get all members
- `PUT /api/admin/organizations/{id}/verify` - Verify organization account
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

### Members Table
- Personal information
- Skills and interests
- Verification status

### Organizations Table
- Organization information (name, description, mission)
- Contact and location details
- Verification status and rating

### Opportunities Table
- Opportunity details (title, description, requirements, deadline)
- Organization and assigned members
- Status and category

### Applications Table
- Member applications for opportunities
- Skills and motivation
- Status (pending, accepted, rejected)

### Categories Table
- Opportunity categories (Education, Environment, Health, etc.)
- Icons and colors for UI

## 🧪 Testing

### Default Users

After seeding, the following users are available:

**Admin**
- Email: `admin@platformpro.com`
- Password: `admin123`

**Test Users**
- Email: `admin@example.com` / Password: `password`
- Email: `organization@example.com` / Password: `password`
- Email: `member@example.com` / Password: `password`

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
