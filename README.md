
# Back office

Consultant dashboard

## Login credentials
-Email: test@email.com
-Password: test@email.com

## Features

Calendar UI provided by AdminLTE.io, used to visualize appointments. Might look a bit clunky when there are many appointments, I didn't worked on that since i thought it would be out of scope for this project.


## Middlewares used

- Auth (Illuminate\Support\Facades\Auth)
- Throttle

## Installation


```bash
  git clone https://github.com/DanteZ08/C-Admin.git
  composer install 
  php artisan serve
```
For ```php artisan serve``` please use different ports or hosts

## UML Diagram

It is present in the project as a page, routed in:
```bash
  [URL]/uml
```
## Database

Present in the project's root folder: 
```
calendar.sql
```
