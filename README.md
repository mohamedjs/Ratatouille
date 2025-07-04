 # Ratatouille – Laravel Movie Catalog Platform

Ratatouille is a full-featured movie catalog and discovery platform built with Laravel. It supports user authentication, admin management, advanced movie categorization, search and filtering, and a modern, responsive UI. The system is designed for both end-users and administrators to manage and explore a rich database of films, categories, and types.

---

## Features

- **User Authentication**: Registration, login, password reset (Laravel Auth)
- **Admin Dashboard**: Add/edit categories, types, and movies (with images, details, links, and series support)
- **Movie Catalog**: Browse, search, and filter movies by name, year, quality, type, and category
- **Movie Chains/Series**: Support for film series (chains) and related movies
- **AJAX Endpoints**: Dynamic category/type/film management for admin
- **Responsive UI**: Blade templates for both admin and user-facing views
- **Localization Ready**: Language files for easy translation

---

## Architecture Overview

- **Backend**: Laravel (PHP)
- **Frontend**: Blade templates, Bootstrap, jQuery, custom CSS/JS
- **Database**: MySQL (default), easily swappable for SQLite/Postgres
- **Auth**: Laravel Auth scaffolding

---

## Project Structure

- `app/` – Models (Film, Cat, Typ, Film_typ, User), controllers (home, admin, ajax, search, auth)
- `resources/views/` – Blade templates for admin, home, film details, search, and layout
- `resources/lang/` – Language files (validation, auth, etc.)
- `resources/assets/` – JS (Vue, Bootstrap, AJAX), SCSS/CSS
- `routes/web.php` – Web routes (home, admin, film, search, auth)
- `routes/api.php` – API routes (default Laravel user endpoint)
- `database/migrations/` – Table definitions for users, films, categories, types, film-type pivot
- `database/seeds/` – Example data seeding

---

## Database Schema

- **users**: id, name, email, password, remember_token
- **cats**: id_ca, film_ca (category name)
- **typs**: id, film_type (type/genre)
- **films**: id, film_name, datials, story, quality, year, cima4u, dardarkom, aflm, cinemalek, promo, film_img, cat_id, chain_id
- **film_typ**: id, film_id, type_id (pivot table for many-to-many film-type)

See `database/migrations/` for full schema.

---

## Main Routes

### Web Routes (`routes/web.php`)

| Method | Endpoint                | Controller@Method      | Description                       |
|--------|-------------------------|------------------------|-----------------------------------|
| GET    | /                       | home@home              | Home page, movie list             |
| POST   | /                       | home@home              | Search by name                    |
| GET    | /admin                  | admin@adhome           | Admin dashboard                   |
| POST   | /admin                  | admin@adhome           | Admin add/edit                    |
| POST   | /gettype                | ajax@gettype           | Add new type (AJAX)               |
| POST   | /change                 | ajax@change            | Change category (AJAX)            |
| POST   | /getcat                 | ajax@getcat            | Add new category (AJAX)           |
| POST   | /getfilm                | ajax@getfilm           | Get all films (AJAX)              |
| GET    | /film/{id}              | home@cat               | Movies by category                |
| GET    | /datials/{id}           | home@datials           | Movie details                     |
| GET    | /chain/{id}             | home@chain             | Movies in a series/chain          |
| GET    | /searchyear/{year}      | search@searchyear      | Search by year                    |
| GET    | /searchtype/{type}      | search@searchtype      | Search by type                    |
| GET    | /searchquality/{quality}| search@searchquality   | Search by quality                 |
| POST   | /searchtype/{quality}   | search@searchtype      | Search by type (POST)             |
| GET    | /home                   | search@searchname      | Search by name (GET)              |
| POST   | /home                   | search@searchname      | Search by name (POST)             |
| Auth   | /login, /register, etc. | Laravel Auth           | User authentication               |
| GET    | /home                   | HomeController@index   | User dashboard (after login)      |

### API Routes (`routes/api.php`)

- Default: `/api/user` (returns authenticated user)

---

## Setup Instructions

1. **Clone the repo**
2. `cd old/Ratatouille`
3. `composer install`
4. `cp .env.example .env` and set DB connection (default: MySQL)
5. `php artisan key:generate`
6. `php artisan migrate --seed` (creates tables and seeds data)
7. `php artisan serve` (run the app)

- For SQLite: touch `database/database.sqlite` and set `DB_CONNECTION=sqlite` in `.env`
- For MySQL/Postgres: update `.env` accordingly

---

## Usage

- Visit `/` for the movie catalog
- Visit `/admin` for the admin dashboard (admin middleware, default user id=1)
- Use search and filter features to explore movies
- Add/edit categories, types, and movies via admin

---

## Extensibility & Notes

- Easily add new movie attributes, categories, or types
- Blade templates and language files can be customized for branding/localization
- AJAX endpoints allow for dynamic admin UI
- Designed for extensibility and easy integration with modern frontends

---

## License

MIT. See LICENSE file.
