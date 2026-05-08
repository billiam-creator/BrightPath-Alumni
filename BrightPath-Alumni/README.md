# 🎓 BrightPath Alumni – Laravel Web Application

A full-featured alumni management platform for BrightPath International School.

---

## ✅ Fixes & Updates in This Version

### Bug Fixes
- **Routes**: Completely rewrote `routes/web.php` — fixed broken `HomeController` references, corrected all dashboard route names (`dashboard.events.*`, `dashboard.members.*`, `dashboard.gallery.*`)
- **Dashboard view**: Was pointing to non-existent `view('dashboard')` — now correctly loads `dashboard/home.blade.php`
- **Navbar scroll bug**: `id="mainNavbar"` was missing from `<nav>` tag — JS scroll effect now works
- **`@stack('scripts')`**: Was missing from frontend layout — Typed.js on homepage now loads correctly
- **Contact route**: View was referencing `contact.store` correctly; verified the `contact.index` name is now defined
- **Gallery/Member delete**: Old photos are now properly deleted from storage on update or delete
- **Event route names**: Public events used deprecated `frontend.events.index` etc — all updated
- **Auth pages**: Replaced plain Tailwind-only guest layout (broken without Vite build) with self-contained Bootstrap-based design that works out of the box

### UI Improvements
- Beautiful gradient auth pages (login, register, forgot/reset password) — no Vite required
- Polished admin dashboard with sidebar navigation, stat cards, and clean data tables
- Improved frontend layout: proper sticky navbar with active link highlighting, flash message display
- Better welcome page with hero stats strip, improved cards and CTA section
- Consistent button/badge/card styling throughout

### Email (Forgot Password) — Fixed
- Updated `.env.example` with clear mail configuration for Gmail, Mailtrap and SendGrid
- The forgot-password and reset-password views are redesigned and fully functional
- Controller logic was correct — the issue was typically a missing/wrong `.env` mail config

---

## 🚀 Setup Instructions

### 1. Clone & Install
```bash
git clone <your-repo>
cd BrightPath-Alumni
composer install
```

### 2. Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and fill in:
- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- Mail settings (see below)

### 3. Database
```bash
php artisan migrate
php artisan storage:link
```

### 4. Run
```bash
php artisan serve
```

---

## 📧 Fixing Email / Forgot Password

The forgot-password flow requires working SMTP credentials in your `.env`.

### Option A: Gmail (recommended for small projects)
1. Go to your Google Account → Security → 2-Step Verification → App passwords
2. Create an App Password for "Mail"
3. Set in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_gmail@gmail.com
MAIL_PASSWORD=xxxx xxxx xxxx xxxx   # 16-char app password (no spaces)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="BrightPath Alumni"
```

### Option B: Mailtrap (for testing, emails don't go to real inboxes)
1. Create a free account at https://mailtrap.io
2. Go to Email Testing → Inboxes → SMTP Settings
3. Copy credentials into `.env`

### Option C: Local development with Mailpit
If using Laravel Sail or Herd, Mailpit is included:
```env
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```
View emails at http://localhost:8025

### After changing mail config:
```bash
php artisan config:clear
php artisan cache:clear
```

---

## 📁 Key Files

| File | Purpose |
|------|---------|
| `routes/web.php` | All application routes |
| `routes/auth.php` | Auth routes (login, register, password reset) |
| `app/Http/Controllers/Auth/PasswordResetLinkController.php` | Sends reset email |
| `app/Http/Controllers/Auth/NewPasswordController.php` | Handles new password |
| `resources/views/layout/frontend.blade.php` | Main public layout |
| `resources/views/dashboard/layout.blade.php` | Admin dashboard layout |
| `resources/views/auth/` | Login, register, forgot/reset password views |
| `.env.example` | Environment variable template |

---

## 🗂️ Routes Reference

| URL | Name | Description |
|-----|------|-------------|
| `/` | `home` | Welcome page |
| `/about` | `about` | About page |
| `/events` | `events.index` | Public events listing |
| `/members` | `members` | Public members page |
| `/gallery` | `gallery` | Public gallery |
| `/contact` | `contact.index` | Contact form |
| `/dashboard` | `dashboard` | Admin home (auth required) |
| `/dashboard/events` | `dashboard.events.index` | Manage events |
| `/dashboard/members` | `dashboard.members.index` | Manage members |
| `/dashboard/gallery` | `dashboard.gallery.index` | Manage gallery |
| `/login` | `login` | Login page |
| `/register` | `register` | Register page |
| `/forgot-password` | `password.request` | Forgot password |
| `/reset-password/{token}` | `password.reset` | Reset password |

---

© {{ date('Y') }} BrightPath International School Alumni
