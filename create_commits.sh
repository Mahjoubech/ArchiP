#!/bin/bash

echo "🚀 Starting 100 commits for ArshiPristige Backend"

# Phase 1: Commits 1-20 (Foundation)
echo "📋 Phase 1: Foundation (Commits 1-20)"

# Commit 1
git add .
git commit -m "feat: initialize Laravel project with basic structure"

# Commit 2
git add .env.example config/database.php
git commit -m "chore: configure database and environment settings"

# Commit 3
git add config/sanctum.php app/Http/Kernel.php
git commit -m "chore: setup Laravel Sanctum for API authentication"

# Commit 4
git add config/cors.php
git commit -m "chore: configure CORS and middleware settings"

# Commit 5
git add README.md
git commit -m "docs: add initial README with project overview"

# Continue with remaining commits...
echo "✅ Phase 1 completed"