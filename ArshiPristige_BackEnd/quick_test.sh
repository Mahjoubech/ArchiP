#!/bin/bash

# ArshiPristige API Quick Test Script
# This script tests the basic functionality of the API

echo "🚀 Starting ArshiPristige API Quick Test"
echo "========================================"

# Check if server is running
echo "📡 Checking if server is running..."
if curl -s http://localhost:8000/api/categories > /dev/null; then
    echo "✅ Server is running on http://localhost:8000"
else
    echo "❌ Server is not running. Please start with: php artisan serve"
    exit 1
fi

# Test public endpoints
echo ""
echo "🌐 Testing Public Endpoints..."
echo "-----------------------------"

# Test categories endpoint
echo "📋 Testing categories endpoint..."
curl -s http://localhost:8000/api/categories | jq '.message' 2>/dev/null || echo "Categories endpoint response received"

# Test projects endpoint
echo "🏗️ Testing projects endpoint..."
curl -s http://localhost:8000/api/projects | jq '.message' 2>/dev/null || echo "Projects endpoint response received"

# Test featured projects endpoint
echo "⭐ Testing featured projects endpoint..."
curl -s http://localhost:8000/api/projects/featured | jq '.message' 2>/dev/null || echo "Featured projects endpoint response received"

# Test admin login
echo ""
echo "🔐 Testing Authentication..."
echo "---------------------------"

# Login as admin
echo "👤 Testing admin login..."
ADMIN_RESPONSE=$(curl -s -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@arshipristige.com",
    "password": "admin123"
  }')

if echo "$ADMIN_RESPONSE" | grep -q "token"; then
    echo "✅ Admin login successful"
    TOKEN=$(echo "$ADMIN_RESPONSE" | grep -o '"token":"[^"]*"' | cut -d'"' -f4)
    echo "🔑 Token received: ${TOKEN:0:20}..."
else
    echo "❌ Admin login failed"
    echo "Response: $ADMIN_RESPONSE"
fi

# Test admin endpoints with token
if [ ! -z "$TOKEN" ]; then
    echo ""
    echo "👨‍💼 Testing Admin Endpoints..."
    echo "-----------------------------"
    
    # Test admin categories
    echo "📋 Testing admin categories endpoint..."
    curl -s -H "Authorization: Bearer $TOKEN" \
         http://localhost:8000/api/admin/categories | jq '.message' 2>/dev/null || echo "Admin categories endpoint response received"
    
    # Test admin architects
    echo "👷 Testing admin architects endpoint..."
    curl -s -H "Authorization: Bearer $TOKEN" \
         http://localhost:8000/api/admin/architects | jq '.message' 2>/dev/null || echo "Admin architects endpoint response received"
    
    # Test admin clients
    echo "👥 Testing admin clients endpoint..."
    curl -s -H "Authorization: Bearer $TOKEN" \
         http://localhost:8000/api/admin/clients | jq '.message' 2>/dev/null || echo "Admin clients endpoint response received"
fi

echo ""
echo "✅ Quick test completed!"
echo ""
echo "📚 Next steps:"
echo "1. Import ArshiPristige_API.postman_collection.json into Postman"
echo "2. Set base_url to http://localhost:8000"
echo "3. Use the token from admin login as auth_token variable"
echo "4. Follow the API_TESTING_GUIDE.md for comprehensive testing"
echo ""
echo "🔗 Useful URLs:"
echo "- API Base: http://localhost:8000/api"
echo "- Categories: http://localhost:8000/api/categories"
echo "- Projects: http://localhost:8000/api/projects"
echo "- Admin Login: POST http://localhost:8000/api/login"
echo ""
echo "📖 Documentation:"
echo "- API Testing Guide: API_TESTING_GUIDE.md"
echo "- Postman Collection: ArshiPristige_API.postman_collection.json"
echo "- GitHub Commit Plan: GITHUB_COMMIT_PLAN.md" 