# pruebaGDA jr full stack
prueba full stack laravel php  con Vue  Vuetify Rest api    31 agosto 2024 2:51 pm hora Mexico 

### 3. **Contenido Detallado**

- **Nombre del Proyecto**: Prueba entrevista FullStack PHP
- **Comentarios personales**:
-   Me gusta desarrollar con Laravel PHP y Vue mas Inertia y un framework llamado Vuetify usando la documentacion oficial dejare los links abajo.
    El pdf que me mandaron hice todo lo posible por comprender los requisitos.

    
- **Descripción**:
INTERFAZ RESPONSIVA VUE Y VUETIFY

![image](https://github.com/user-attachments/assets/06814371-94ab-437d-a785-a709eb317013)

INGRESAR DNI PRIMERO  , DESPUES SE PUEDE CON EMAIL

![image](https://github.com/user-attachments/assets/6bf37a96-1609-4f78-bc1a-35e7e4d99de0)

RESTAPI CON TOKEN 
![image](https://github.com/user-attachments/assets/c66d8fcd-20a0-48f2-ab9e-8a2da69d4ae4)

AVISOS EN TODA LA APP SWEETALERT2 
![image](https://github.com/user-attachments/assets/0058938f-77e6-4c52-a863-c3e943e487c4)


  Middleware Creados 2  El del Token  PARA LA API.

  ![image](https://github.com/user-attachments/assets/f88b5b76-fe82-4b4a-b3fc-5f14a555e1c0)


PRUEBAS BACKEND POSTMAN 
![image](https://github.com/user-attachments/assets/43073a16-7e4f-4f85-a9a9-deea4abf68c1)

SIN TOKEN 
![image](https://github.com/user-attachments/assets/add4a26b-10e5-4bf4-b13a-33c433ce685d)



 PROBAMOS DIRECTAMENTE EN UNA PLANTILLA VUE  GUARDAMOS EL TOKEN EN LOCAL STORAGE PARA USARLO 
![image](https://github.com/user-attachments/assets/14495d56-6a71-4c83-9996-abb52ba8ef28)



REGISTRO DE CUSTOMER 
![image](https://github.com/user-attachments/assets/82df9592-b246-45bf-8c9c-0f3865c8c058)


BUSQUEDA CONSULTA POR DNI PRIMERO Y LUEGO POR EMAIL , ACCESO MIENTRAS EL TOKEN ESTE VIGENTE UNA VEZ TERMINADO EL TIEMPO CADUCA EL ACCESO 
![image](https://github.com/user-attachments/assets/37418cb2-a0e0-44e1-beae-97c657cfec5a)

VISTA AUTENTICADA IMPOSIBLE INGRESAR SIN TOKEN Y PROTEGIDA CON MIDDELWARE

![image](https://github.com/user-attachments/assets/4d42d9e1-8c78-4d1e-8f3e-89fda272c8c1)
![image](https://github.com/user-attachments/assets/7056050a-3275-4622mid-a8f5-44f4357e4b24)

MIDDLEWARE DE TOKEN CREADO POR MI MISMO , NO ES DE LARAVEL O BREEZE O SANCTUM.
![image](https://github.com/user-attachments/assets/2b5095ab-ab41-420f-8c21-d2b974c4fa21)


MOTOR MYSQL BASE DE DATOS

![image](https://github.com/user-attachments/assets/2e0b2941-3b3f-4429-ba52-7721ac90b883)

MIGRACIONES EXACTAMENTE IGUAL A LOS REQUISITOS DEL PDF.
![image](https://github.com/user-attachments/assets/f508394a-b455-42f1-b5b4-9128554b79c8)


SEEDERS cuando se duplique un mismo token volver a correr mgiraciones con php artisan migrate:fresh  
aveces paso es raro pero si puede pasar que se duplica un token de prueba.
- ![image](https://github.com/user-attachments/assets/8b329cd1-df39-4122-8060-a76864510840)

- LOS DATOS DE REGIONES Y COMMUNES SON FAKER SON DE UNA BIBLIOTECA DE PHP  CREA UN COUNTRY ALEATORIO UN NOMBRE.
![image](https://github.com/user-attachments/assets/36c1c345-d2eb-411c-9ac3-8e1434ebfe79


SEEDER DE PRUEBA PARA PROBAR EL MOTOR Y LAS APIS

![image](https://github.com/user-attachments/assets/da722369-8660-4b85-b25c-106d9565fb7b)

TABLA DE REGIONES (MIGRACION)
![image](https://github.com/user-attachments/assets/14d566c9-9462-4210-bdca-70ef9f4e1073)

TABLA DE COMMUNES 
![image](https://github.com/user-attachments/assets/3ae6219b-e0bb-4961-a61a-5f7c5b9c0022)


TABLA DE CUSTOMER CLAVES FORANEAS Y PRIMARY KEY EN MODELOS
![image](https://github.com/user-attachments/assets/3720e0ce-f967-4ac3-8174-57406add0d5b)

TABLA DE TOKEN MIGRACION HECHA DESDE CERO 
![image](https://github.com/user-attachments/assets/8af54ae7-7241-4314-a399-df14f3a529a9)

- MODELO CUSTOMER PRIMARY KEY COMO ESTA EN EL PDF PASADO A MODELOS LARAVEL
- ![image](https://github.com/user-attachments/assets/486caffa-193b-4adc-8e8c-1f94885acca6)

POR ULTIMO LO DE APPBUG Y LOS REQUISITOS DE LOG DEL .ENV 
![image](https://github.com/user-attachments/assets/8c1b3bd9-d5f3-4a35-8324-6a2c1da425e1)


METODOS USADOS POST , DELETE Y GET 
CONTROLADOR CUSTOMER CONSULTA POST  VALIDACIONES PROTEGIENDO INJECTION  
![image](https://github.com/user-attachments/assets/88094dd1-94a2-4fb7-87f9-dc6697430231)


METODO PARA CONSULTA GET  SUCESS 200  VALIDADA CON TOKEN DESDE APIS 
![image](https://github.com/user-attachments/assets/61357677-b585-4b79-88a6-97cb158c70af)

METODO PARA CONSULTA DESTROY  DELETE 
![image](https://github.com/user-attachments/assets/c2451edf-5586-49d7-963e-6bdde308760b)

CONSULTA SOLO PARA LAS REGIONES ACTIVAS
![image](https://github.com/user-attachments/assets/29624197-0bc9-4d00-a3bd-00ad6adfa3fd)

CONSULTA SOLO PARA REGIONES COMMUNES ACTIVAS
![image](https://github.com/user-attachments/assets/6af018e2-7780-47e5-9818-d88348f556d6)




- **Instalación**:
  
```markdown
My Laravel Project

 Descripción

Este es un proyecto de ejemplo usando Laravel, Vue.js y Vuetify para crear una aplicación de gestión de clientes.

## Instalación
composer create-project --prefer-dist laravel/laravel pruebaGDAJorge
php artisan key:generate
composer require inertiajs/inertia-laravel
 php artisan inertia:vue
 npm i
 npm i --save-dev vue-loader
npm i --save-dev @vitejs/plugin-vue
npm install --save-dev @inertiajs/vue3
composer require inertiajs/inertia-laravel
 php artisan migrate
λ npm install vuetify --save


NPM RUN DEV CORREMOS EL SERVIDOR INTERNO
PHP ARTISAN SERVE

## Uso
Laragon ![image](https://github.com/user-attachments/assets/a715928d-05bd-4a9e-a3c4-4095e4155baf)

POSTMAN

![image](https://github.com/user-attachments/assets/23490202-332e-4b1f-b213-c2bacbd2889d)

Accede a la aplicación en `http://localhost:8000`


## Contribución

Las contribuciones son bienvenidas. Por favor, sigue el flujo de trabajo de GitHub mencionado anteriormente para contribuir al proyecto.

## Documentacion Oficial
https://vuetifyjs.com/en/
https://faker.readthedocs.io/en/master/providers/faker.providers.address.html
https://compilandoelmundo.com/post/como-crear-un-proyecto-con-laravel-11-vue-3-inertia-js-y-vite
https://laravel.com/

## Contacto

Jorge Ramirez Penagos jorgepenagos50@gmail.com
