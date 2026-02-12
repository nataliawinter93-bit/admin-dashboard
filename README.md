# Modulares Role‑ & Permission‑basiertes Admin‑Dashboard

Ein kleines, aber professionelles Laravel‑Backend-System mit modularer Architektur:

- CRUD für Nutzer, Rollen und Berechtigungen  
- Logging & Activity History  
- REST‑API für externe Clients  
- Modernes UI basierend auf Laravel Breeze  
- Ziel: Ein sauberes, erweiterbares Architektur‑ und Rechtekonzept  

---

## 🚀 Features

- Benutzerverwaltung (CRUD)
- Rollenverwaltung (CRUD)
- Berechtigungsverwaltung (CRUD)
- Activity Log (Erstellung, Aktualisierung, Löschung)
- REST API (Laravel Sanctum)
- Zugriffskontrolle über Policies & Middleware
- Responsive Admin UI (Tailwind + Breeze)
- SQLite-Unterstützung

---

## 🛠 Tech Stack

- **PHP 8.3**
- **Laravel 12.49**
- **SQLite**
- **Laravel Breeze**
- **Tailwind CSS**
- **Laravel Sanctum**
- **VSCode**

---

## 📦 Installation

### 1. Repository klonen

```bash
git clone <repo-url>
cd admin-dashboard
```

### 2. Abhängigkeiten installieren

```bash
composer install
npm install
```

### 3. Environment-Datei erstellen

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Datenbank vorbereiten

Falls SQLite verwendet wird:

```bash
touch database/database.sqlite
```

### 5. Migrationen + Seeder ausführen

```bash
php artisan migrate:fresh --seed
```

### 6. Development Server starten

```bash
npm run dev
php artisan serve
```

---

## 🔐 Default Login Credentials

### Admin
```
Email: admin@example.com
Passwort: 123456
```

### User
```
Email: user@example.com
Passwort: password
```

---

## 📚 API Endpoints (Auszug)

| Methode | Endpoint | Beschreibung |
|--------|----------|--------------|
| GET | /api/users | Liste aller Benutzer |
| GET | /api/users/{id} | Einzelner Benutzer |
| POST | /api/users | Benutzer erstellen |
| PUT | /api/users/{id} | Benutzer aktualisieren |
| DELETE | /api/users/{id} | Benutzer löschen |

Authentifizierung über **Laravel Sanctum**.

---

## 🧱 Projektstruktur

```
app/
 ├── Http/
 │    ├── Controllers/Admin
 │    ├── Middleware
 │    └── Requests
 ├── Models
 ├── Policies
 └── Traits (Activity Logging)
resources/
 ├── views/admin
 └── css/js (Breeze)
database/
 ├── migrations
 └── seeders
```

---

## 🔒 Rollen & Berechtigungen

### Rollen:
- **Admin** – Vollzugriff
- **User** – Eingeschränkter Zugriff

### Berechtigungen:
- user.create  
- user.update  
- user.delete  
- role.manage  
- permission.manage  

Zuweisung über Pivot-Tabellen.

---

## 📝 License

MIT License  
Dieses Projekt darf frei verwendet, kopiert und erweitert werden.

---

## 👤 Autor

Studentenprojekt (PHP / Laravel Fallstudie)

