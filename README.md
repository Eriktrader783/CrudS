Gestión de Estudiantes (Laravel)

Proyecto CRUD para gestionar Estudiantes y Carreras con Laravel, Blade y TailwindCSS.
En una sola pantalla puedes registrar estudiantes mediante un formulario y ver, al mismo tiempo, una tabla con los estudiantes dados de alta (con paginación). Incluye validaciones, relaciones Eloquent y eliminación segura.

Autor: Erik Cervantes

✨ ¿Qué construimos?

Módulo Carreras

Modelo Carrera (id, nombre, timestamps)

CRUD mínimo: listar, crear rápido desde el index (opcional editar/eliminar)

Módulo Estudiantes

Modelo Estudiante con relación belongsTo(Carrera)

Campos: nombre, correo, semestre, carrera_id

Vista unificada: formulario + tabla en estudiantes.index

Validación en servidor (Laravel FormRequest/validate)

Paginación y mensajes de éxito

Diseño

TailwindCSS (con Vite o CDN, según prefieras)

Layout base layouts/app.blade.php

🧱 Tecnologías

PHP 8+, Laravel 10/11

MySQL/MariaDB

TailwindCSS (Vite o CDN)

Blade, Eloquent ORM

📁 Estructura principal
app/
  Http/Controllers/
    EstudianteController.php
    CarreraController.php
  Models/
    Estudiante.php
    Carrera.php
resources/
  views/
    layouts/app.blade.php
    estudiantes/index.blade.php
    carreras/index.blade.php
database/
  migrations/
    create_carreras_table.php
    create_estudiantes_table.php   // con foreignId('carrera_id')

🗄️ Esquema de BD

carreras

id (PK)

nombre (string, único recomendado)

timestamps

estudiantes

id (PK)

nombre (string)

correo (string)

semestre (tinyInteger 1–12)

carrera_id (FK → carreras.id, cascadeOnDelete)

timestamps

🔗 Relaciones Eloquent
// app/Models/Estudiante.php
public function carrera() {
  return $this->belongsTo(Carrera::class);
}

// app/Models/Carrera.php
public function estudiantes() {
  return $this->hasMany(Estudiante::class);
}

🚦Rutas clave
GET  /                 → redirect a estudiantes.index
GET  /estudiantes      → EstudianteController@index
POST /estudiantes      → EstudianteController@store
DELETE /estudiantes/{estudiante} → EstudianteController@destroy

GET  /carreras         → CarreraController@index
POST /carreras         → CarreraController@store

🧰 Instalación

Clona el repo y entra a la carpeta del proyecto

Copia el env y genera la clave:

cp .env.example .env
php artisan key:generate


Configura tu base de datos en .env

DB_DATABASE=tu_bd
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password


Instala dependencias:

composer install
npm install   # si usarás Vite/Tailwind local


Migra la base:

php artisan migrate


Arranca el servidor:

php artisan serve
