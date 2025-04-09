

# Laravel Contact Form (Livewire + Queue + Admin Panel)

This project implements a full-featured Contact Form in Laravel with the following functionality:

- 📬 Contact form built with Livewire (Name, Email, Subject, Message)
- ✅ Real-time validation and form submission
- 📥 Saves form data to the database
- 📧 Sends email to admin using queued job
- 🔄 Job also sends data to a third-party API (`https://jsonplaceholder.typicode.com/posts`)
- 🛠 Graceful error handling and retry logic
- 📊 Admin panel to view all contact submissions (with pagination & search)

---

## 📦 Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- Laravel 10+
- A running database (MySQL)

---

## ⚙️ Setup Instructions

### 1. Clone the Repo

```bash
git clone https://github.com/abhishek552/laravel_livewire.git
cd laravel_livewire
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Set Up Environment

Copy `.env` file and configure database, mail, and queue settings:

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env`:

```env
APP_NAME="Contact Form"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=assessmentdb
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=bhadauriaabhishek050@gmail.com
MAIL_PASSWORD=slfsnmocxihvxgli
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="bhadauriaabhishek050@gmail.com"
MAIL_FROM_NAME="Contact Form"
```

---

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Start Local Development Server

```bash
php artisan serve
```

---

## 🧵 Queue Setup

### 1. Use Database Driver

```bash
php artisan queue:table
php artisan migrate
```

### 2. Start Queue Worker

```bash
php artisan queue:work
```

This starts processing queued jobs like email and API calls.

---

## 💡 Features Overview

### ✅ Contact Form with Livewire

- Real-time field validation
- Displays a success message after submission
- Stores data in `contact_form_submissions` table

### ✅ Email Notification (Queued)

- Sent to a predefined admin email('admin21@yopmail.com')
- Includes all submitted contact data
- Uses `ShouldQueue` with retry logic

### ✅ Third-Party API Integration (Queued)

- POST request to:  
  `https://jsonplaceholder.typicode.com/posts`

**Payload:**

```json
{
  "title": "Subject",
  "body": "Message",
  "userId": 1
}
```

- Response is logged in `storage/logs/`

### ✅ Admin Panel

- Built with Livewire
- Paginated list of submissions
- Search by email or subject

---

## 📂 Project Structure

```
app/
├── Livewire/ContactForm.php
├── Livewire/Admin/ContactFormList.php
├── Jobs/SendContactFormEmail.php
├── Mail/ContactFormMail.php
├── Models/ContactFormSubmission.php

resources/views/
├── livewire/contact-form.blade.php
├── livewire/admin/contact-form-list.blade.php
├── layouts/app.blade.php
├── welcome.blade.php
├── emails/contact-form.blade.php

routes/web.php
```
http://localhost:8000/
http://localhost:8000/admin/contacts
---

## 📜 Logging

Check logs at:

```
storage/logs/
```

Includes:

- API call responses
- Job failures
- Retry attempts

---
