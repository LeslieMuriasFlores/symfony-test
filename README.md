# symfony-test
Dummy Symfony Test

---

## Personas

- Juan: Administrador del Sistema.
- Maria: Gestor de datos.
- Pedro: Usuario del sistema, podría no encontrarse registrado o autenticado en el mismo.
- Ernesto: Aplicación externa consumidora de la API del sistema.

---

## Historias de Usuario

### (story) Pedro debe poder Registrarse

Como Pedro, necesito poder Registrarme en el sistema y así poderme autenticar luego.

#### ACCEPTANCE CRITERIA

**SCENARIO** _No autenticado en el sistema_

* Registrar los parámetros de Nombres, Apellidos, Cédula, País, Correo, Contraseña y Confirmar Contraseña.
* Los campos Contraseña y Confirmar Contraseña deben validar que sean iguales.
* Mostrar selector de Paises según registros API REST Countries v1.


### (task) Acceder a los registros de Paises usando la API REST Countries v1
Para obtener los registro de los Paises al registrar usuario debe utilizarse la API https://rapidapi.com/apilayernet/api/rest-countries-v1 tomando los datos "name" y "alpha2Code" como Nombre y Código respectivamente.



### (story) Pedro debe poder Autenticarse
Como Pedro, necesito Autenticarme en el sistema y así poder acceder a las diferentes funcionalidades.

#### ACCEPTANCE CRITERIA

**SCENARIO** _No autenticado en el sistema_

* Autenticar usando Correo y Contraseña.
* Al autenticar de forma satisfactoria mostrar interfaz Ver Detalles de Perfil.



### (story) Pedro debe poder Ver Detalles de su Perfil
Como Pedro, necesito Ver los Detalles de mi Perfil y así corroborar la información.

#### ACCEPTANCE CRITERIA

**SCENARIO** _Autenticado como Pedro y encontrándose en la interfaz de Ver Detalles de Perfil_

* Mostrar los datos del usuario, tales como Nombres, Apellidos, Cédula, País y Correo.
* Mostrar botón de Editar y al hacer click ir a Editar Perfil.



### (story) Pedro debe poder Editar su Perfil
Como Pedro, necesito Editar Perfil y así corregir cualquier información erronea del mismo.

#### ACCEPTANCE CRITERIA

**SCENARIO** _Autenticado como Pedro y encontrándose en la interfaz de Editar Perfil_

* Mostrar los datos del usuario, tales como Nombres, Apellidos, Cédula, País, Correo y permitir editarlos todos menos Correo que debe encontrarse deshabilitado.
* Mostrar los datos del usuario permitiendo cambiar la contraseña mostrando los campos Contraseña y Confirmar Contraseña. Solo debe cambiarse la contraseña si se escribe en dichos campos, de lo contrario debe mantener la misma existente.
* Los campos Contraseña y Confirmar Contraseña deben validar que sean iguales.



### (story) Juan debe poder eliminar usuario del Sistema
Como Juan, debo poder Eliminar Usuario del sistema, y así mantener el registro de usuarios solo con usuarios válidos.

#### ACCEPTANCE CRITERIA

**SCENARIO** _Autenticado como Juan y encontrándose en la interfaz Listado de Usuarios_

* Debe mostrar el botón Eliminar en cada registro de usuario del listado y al hacer click mostrar un mensaje de confirmación mostrando: "Está seguro que desea eliminar el usuario xxxxxx.", permitiendo seleccionar si "Eliminar" o "Cancelar".



### (story) Ernesto necesita acceso al listado de Usuarios
Como Ernesto, necesito acceder al Listado de Usuarios del sistema a través de la API, obteniendo los resultados de forma precisa y minimalista.

**SCENARIO** _Autenticado como Pedro mediante JWT_

* Devolver una colección de elementos, donde acada uno de los elementos se corresponda con un registro de usuario.
* Deben contener solo los datos principales del usuario: nombres, apellidos, cédula y correo.
* Debe devolverse en formato json.


### (task) Autenticar usuarios a través de la API
Permitir autenticar los usuarios del sistema a través de la API usando Json Web Token (JWT).


### (task) Proteger interfaz de acceso a la API mediante JWT
Proteger acceso a la interfaz de la API del sistema mediante autenticación JWT.



### (story) Juan debe poder Gestionar Bancos
Como Juan, debo poder Gestionar Bancos como un nomenclador del sistema, y así mantener el registro actualizado de los mismos.

#### ACCEPTANCE CRITERIA

**SCENARIO** _Autenticado como Juan y encontrándose en la interfaz Listado de Bancos_

* Debe mostrarse el botón "Adicionar" y al hacer click abrir interfaz Adicionar Banco.
* Debe mostrarse el botón "Editar" en cada registro del Listado de Banco y al hacer click permitir editar el Banco.
* Debe mostrarse el botón "Eliminar" en cada registro del Listado de Banco y al hacer click permitir editar el Banco.



### (story) Juan debe poder Gestionar Empresas
Como Juan, debo poder Gestionar Empresas como un nomenclador del sistema, y asi mantener un registro actualizado de los mismos.

#### ACCEPTANCE CRITERIA

**SCENARIO** _Autenticado como Juan y encontrándose en la interfaz Listado de Empresas

* Debe mostrarse el botón "Adicionar" y al hacer click abrir interfaz Adicionar Empresas.
* Debe mostrarse el botón "Editar" en cada registro del Listado de Empresas y al hacer click permitir Editar Empresa.
* Debe mostrarse el botón "Eliminar" en cada registro del Listado de Empresas y al hacer click permitir Eliminar Empresa.



### (story) Maria debe poder asignar Banco a usuario
Como María, debo poder Asignar Banco a un usuario del sistema, y así definir a que Banco pertenece el usuario.

#### ACCEPTANCE CRITERIA

**SCENARIO** _Autenticado como Maria y encontrándose en la interfaz Asignar Banco_

* Debe mostrarse el listado de usuarios y el botón "Asignar" en cada registro de los mismos.
* Al hacer click en "Asignar" debe mosrtarse un modal con el selector de Banco y los botones "Aceptar" y "Cancelar".
* Al "Aceptar" debe quedarse registrado el Banco para el Usuario seleccionado.



### (story) Maria debe poder asignar Empresa a usuario
Como María, debo poder Asignar Empresa a un usuario del sistema, y así definir a que Empresa pertenece el usuario.

#### ACCEPTANCE CRITERIA

**SCENARIO** _Autenticado como Maria y encontrándose en la interfaz Asignar Empresa

* Debe mostrarse el listado de usuarios y el botón "Asignar" en cada registro de los mismos.
* Al hacer click en "Asignar" debe mosrtarse un modal con el selector de Empresa y los botones "Aceptar" y "Cancelar".
* Al "Aceptar" debe quedarse registrado el Banco para el Usuario seleccionado.

---

## Requerimientos No Funcionales

* Usar framework Symfony en su versión 4.4 o superior.
* Usar framework Bootstrap 4 para diseño de interfaces.

