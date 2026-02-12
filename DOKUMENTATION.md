
---

# 📘 **Dokumentation – Modulares Role‑ & Permission‑basiertes Admin‑Dashboard**  
**Autor:** Zyma Natalia  
**Kurs:** PHP / Laravel Fallstudie  
**Datum:** 11.02.2026  

---

# 1. Einleitung

## 1.1 Projektübersicht  
Dieses Projekt ist ein **modulares Laravel‑Backend‑System**, das eine vollständige Benutzer‑, Rollen‑ und Berechtigungsverwaltung bietet. Zusätzlich werden alle Aktionen der Benutzer automatisch protokolliert (Activity Logs). Das System stellt außerdem eine REST‑API bereit und basiert auf modernen Laravel‑Technologien wie Breeze, Tailwind CSS und Sanctum.

## 1.2 Zielsetzung  
Ziel des Projekts ist es, ein **professionelles, erweiterbares und sicheres Admin‑Dashboard** zu entwickeln, das ein sauberes Rollen‑ und Rechtekonzept implementiert und gleichzeitig eine klare, moderne Benutzeroberfläche bietet.

## 1.3 Anforderungen laut Aufgabenstellung  
- Entwicklung eines eigenen PHP‑/Laravel‑Projekts  
- Bereitstellung eines Git‑Repositories  
- Erstellung einer Projektdokumentation  
- Erstellung eines README zur Installation  
- Präsentation des Projekts  

---

# 2. Technologien & Entwicklungsumgebung

## 2.1 PHP-Version  
- **PHP 8.3.30**

## 2.2 Laravel-Version  
- **Laravel 12.49.0**

## 2.3 Verwendete Pakete & Tools  
- Laravel Breeze (Auth + UI)  
- Tailwind CSS  
- Laravel Sanctum (API‑Authentifizierung)  
- Laravel Policies  
- Custom Activity Logging Trait  

## 2.4 Datenbank  
- **SQLite** (leicht, portabel, ideal für Fallstudien)

## 2.5 Entwicklungsumgebung  
- VSCode  
- Composer  
- Node.js & npm  
- Git  

---

# 3. Systemarchitektur

## 3.1 MVC-Struktur  
Das Projekt folgt strikt dem Laravel‑MVC‑Pattern:

- **Models:** User, Role, Permission, ActivityLog  
- **Views:** Blade‑Templates (Breeze)  
- **Controller:** Admin‑Controller für CRUD‑Operationen  

## 3.2 Projektstruktur (Auszug)

```
app/
 ├── Http/Controllers/Admin
 ├── Models
 ├── Policies
 └── Traits/ActivityLoggable.php
resources/
 └── views/admin
database/
 ├── migrations
 └── seeders
routes/
 ├── web.php
 └── api.php
```

## 3.3 Routing-Konzept  
- `/admin/users` – Benutzerverwaltung  
- `/admin/roles` – Rollenverwaltung  
- `/admin/permissions` – Berechtigungen  
- `/admin/logs` – Activity Logs  
- `/api/*` – REST‑API  

## 3.4 Middleware  
- `auth` – schützt alle Admin‑Routen  
- `admin` – nur Admin‑Benutzer dürfen Rollen/Permissions verwalten  

## 3.5 Policies  
Policies steuern den Zugriff auf:

- User  
- Roles  
- Permissions  

Beispiel:

```php
public function update(User $user, User $model)
{
    return $user->hasPermission('user.update');
}
```

## 3.6 API-Authentifizierung  
Die API verwendet **Laravel Sanctum**:

- Token‑basierte Authentifizierung  
- Schutz sensibler Endpunkte  

---

# 4. Datenbankdesign

## 4.1 Tabellenübersicht  
- `users`  
- `roles`  
- `permissions`  
- `role_user` (Pivot)  
- `permission_role` (Pivot)  
- `activity_logs`  

## 4.2 Beziehungen  
- Ein Benutzer kann mehrere Rollen haben (n:m)  
- Eine Rolle kann mehrere Berechtigungen haben (n:m)  
- Ein Benutzer kann viele Activity Logs haben (1:n)  

## 4.3 ER‑Diagramm (ASCII)

```
Users ───< role_user >─── Roles ───< permission_role >─── Permissions
  │
  └──< ActivityLogs
```

## 4.4 Migrationen  
Alle Tabellen werden über Laravel‑Migrationen erstellt.

## 4.5 Seeder  
Beim Befehl:

```
php artisan migrate:fresh --seed
```

werden erstellt:

- Admin‑Rolle  
- Standard‑Berechtigungen  
- Admin‑Benutzer  

---

# 5. Implementierung

## 5.1 Benutzerverwaltung (CRUD)  
- Benutzer erstellen  
- Benutzer bearbeiten  
- Benutzer löschen  
- Rollen zuweisen  

## 5.2 Rollenverwaltung (CRUD)  
- Rollen erstellen  
- Rollen bearbeiten  
- Rollen löschen  

## 5.3 Berechtigungsverwaltung (CRUD)  
- Permissions erstellen  
- Permissions bearbeiten  
- Permissions löschen  

## 5.4 Activity Logging  
Jede Aktion wird automatisch protokolliert:

- create  
- update  
- delete  

Beispiel:

```
User 1 updated Role 3 at 2026-02-12 10:15
```

## 5.5 UI (Breeze + Tailwind)  
- Responsive Layout  
- Admin‑Navigation  
- Tabellen mit Filtern  
- Pagination  

## 5.6 API-Endpunkte (Auszug)

| Methode | Endpoint | Beschreibung |
|--------|----------|--------------|
| GET | /api/users | Liste aller Benutzer |
| POST | /api/users | Benutzer erstellen |
| GET | /api/users/{id} | Einzelner Benutzer |
| PUT | /api/users/{id} | Benutzer aktualisieren |
| DELETE | /api/users/{id} | Benutzer löschen |

---

# 6. Rollen- & Berechtigungssystem

## 6.1 Rollenmodell  
Beispielrollen:

- **Admin**  
- **User**

## 6.2 Berechtigungsmodell  
Beispiele:

- user.create  
- user.update  
- user.delete  
- role.manage  
- permission.manage  

## 6.3 Zugriffskontrolle über Policies  
Policies prüfen, ob ein Benutzer eine bestimmte Berechtigung besitzt.

## 6.4 Beispiel  
Ein Benutzer ohne `role.manage` kann keine Rollen bearbeiten.

---

# 7. Installation & Deployment

## 7.1 Voraussetzungen  
- PHP 8.3  
- Composer  
- Node.js  
- SQLite  

## 7.2 Installation

```
composer install
npm install
cp .env.example .env
php artisan key:generate
```

## 7.3 Datenbankinitialisierung

```
touch database/database.sqlite
php artisan migrate:fresh --seed
```

## 7.4 Starten des Projekts

```
npm run dev
php artisan serve
```

## 7.5 Testzugänge

**Admin:**  
- admin@example.com  
- 123456  

**User:**  
- user@example.com  
- password  

---

# 8. Tests & Qualitätssicherung

## 8.1 Automatisierte Tests  
**Es wurden keine automatisierten Tests implementiert.**

## 8.2 Manuelle Tests  
Die Funktionsprüfung erfolgte manuell über:

- Benutzeroberfläche  
- API‑Requests (Browser / Postman)  

## 8.3 Sicherheit  
- Auth Middleware  
- Admin Middleware  
- CSRF‑Schutz  
- Sanctum‑Token  

---

# 9. Fazit

## 9.1 Was wurde erreicht  
- Vollständiges Admin‑Dashboard  
- Rollen‑ und Berechtigungssystem  
- Activity Logging  
- REST‑API  
- Moderne UI  

## 9.2 Herausforderungen  
- Policies korrekt konfigurieren  
- Pivot‑Tabellen  
- Activity Logging  

## 9.3 Erweiterungsmöglichkeiten  
- Passwort‑Reset  
- Zwei‑Faktor‑Authentifizierung  
- Dashboard‑Statistiken  
- Export/Import  

---

# 10. Anhang

## 10.1 Screenshots  


## 10.2 Git‑Repository  


---

