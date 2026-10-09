# Taller #1 - Programación Orientada a Objetos (POO) en PHP

**Universidad Tecnológica de Panamá** – Facultad de Ingeniería de Sistemas Computacionales
**Módulo III:** Elementos de la Programación Orientada a Objetos – Desarrollo Web

| | |
|---|---|
| **Instructor** | Irina Fong |
| **Grupo** | 1S3122 |
| **Autor** | Iliana Diez |
| **Fecha** | 9 de octubre de 2026 |

---

## 📋 Detalles del Laboratorio

Durante el Taller #1 se practicaron los conceptos fundamentales de la POO en PHP: herencia de clases, miembros y métodos estáticos, la diferencia entre `self::` y `static::` (Late Static Binding), restricción de herencia con la palabra clave `final`, constantes matemáticas y el modelado jerárquico de entidades del mundo real.

Se creó un panel principal (`index.php`) para navegar entre todos los problemas del taller.

![Panel principal](img/poo-01-panel-principal.png)

### 🧩 Ejercicios desarrollados

#### 1. Herencia básica y sobrescritura (`Problema1.php`)
- Clase base `Coche` con la propiedad protegida `$color` y métodos getter y setter.
- Clase derivada `CocheDeLujo` que extiende de `Coche` e incorpora el atributo protegido `$extras`.
- Sobrescritura del método `printCaracteristicas()` en la clase hija para mostrar el color heredado y los extras del vehículo en una tarjeta de Bootstrap.
<img width="715" height="438" alt="Captura de pantalla 2026-10-09 101227" src="https://github.com/user-attachments/assets/e0e2a890-4929-4f26-baed-800d4868b21b" />



#### 2. Late Static Binding frente a Static Binding (`Problema2.php`)
- Herencia entre las clases `A` y `B` para comparar la resolución de métodos estáticos.
- `self::` hace referencia a la clase donde se escribió el método; `static::` (Late Static Binding) hace referencia, en tiempo de ejecución, a la clase que realiza la llamada.

<img width="845" height="530" alt="Captura de pantalla 2026-10-09 101310" src="https://github.com/user-attachments/assets/15655d6d-0e96-4202-916f-490618b1d670" />


#### 3. Restricción de herencia (`Problema3.php`)
- Uso de `final` antes de la declaración de una clase (`final class Coche`).
- Al intentar extender la clase sellada, PHP lanza un Fatal Error (`Class CocheDeLujo cannot extend final class Coche`).
<img width="662" height="695" alt="Captura de pantalla 2026-10-09 101315" src="https://github.com/user-attachments/assets/cc40c2a4-dea7-4e0a-9f5d-de4cb8a222bc" />



#### 4. Encapsulamiento y constantes (`Problema4.php`)
- Clase `Circulo` con el atributo privado `$radio` y métodos para calcular el área (π × r²) y el perímetro (2 × π × r).
- Uso de la constante `M_PI` y de `number_format()` para dar formato a los resultados.
- Formulario con método `POST` para ingresar el radio dinámicamente.
<img width="857" height="532" alt="Captura de pantalla 2026-10-09 101324" src="https://github.com/user-attachments/assets/5fa3b6c6-1818-499f-9d26-9b50d0a8dd1b" />



#### 5. Sistema escolar y modelado jerárquico (`Problema#5/`)
- **`Persona.php`:** clase base con `$nombre`, `$apellido` y `$fechaNacimiento`.
- **`Estudiante.php`:** hereda de `Persona` e incorpora `$indiceAcademico`, `$cohorte`, `$estadoAcademico` y `$modalidadEstudio`.
- **`Docente.php`:** hereda de `Persona` e incorpora `$codigoDocente`, `$departamento`, `$categoria`, `$maximoTitulo` y `$tipoContratacion`.
- **`index.php`:** instancia los objetos y muestra las fichas en tarjetas.

<img width="951" height="607" alt="Captura de pantalla 2026-10-09 101330" src="https://github.com/user-attachments/assets/9726b194-0e2a-4c06-a221-fbc982088840" />


---

## 🎛️ Controles Utilizados

| Control | Dónde se usa |
|---|---|
| Tarjetas (`card`) de Bootstrap | Presentación de resultados en todos los problemas |
| Campo numérico (`input`) | Radio del círculo en `Problema4.php` |
| Botón de envío (`submit`) | Calcular el área y el perímetro en `Problema4.php` |
| Enlaces de navegación | Panel principal `index.php` hacia cada problema |

---

## ⚙️ Proceso de Instalación

1. Instalar **WampServer** y comprobar que el icono esté en verde.
2. Clonar el repositorio:
   ```bash
   git clone https://github.com/IlianaDiez/Taller1-POO.git
   ```
3. Copiar la carpeta `Taller1-POO` dentro de `C:\wamp64\www\`.
4. Abrir en el navegador: `http://localhost/Taller1-POO/index.php`

![WampServer en verde y proyecto en localhost](img/poo-07-instalacion.png)

---

## 🛠️ Tecnologías y Versiones

| Tecnología | Versión | Uso |
|---|---|---|
| PHP | `[COMPLETAR: resultado de php -v]` | Implementación de clases, visibilidad, herencia, resolución estática y constantes |
| Apache | `[COMPLETAR]` | Servidor local |
| WampServer | `[COMPLETAR]` | Entorno de ejecución local |
| HTML5 y Bootstrap | 5.3 | Maquetación responsiva y tarjetas |
| Google Fonts | Plus Jakarta Sans | Tipografía |
| Git y GitHub | – | Control de versiones |

---

## 🗄️ Evidencia de insertar, modificar y eliminar

No aplica. Este taller no usa base de datos, por lo que no hay operaciones de insertar, modificar ni eliminar registros. Las evidencias de ejecución de cada ejercicio están en la sección de ejercicios.

---

## ✅ Cumplimiento de lo solicitado

- Clases `Coche` y `CocheDeLujo` con herencia mediante `extends`.
- Métodos y miembros estáticos, con la diferencia entre `self::` y `static::`.
- Impedimento de herencia con `final`.
- Clase `Circulo` con el cálculo del área y el perímetro.
- Clases `Estudiante` y `Docente` que heredan de `Persona`.
- Código fuente completo en el repositorio.

---

## 🎯 Conclusión

El taller permitió afianzar el uso práctico de la POO en PHP: herencia, encapsulamiento de datos, control explícito de extensiones con `final` y resolución dinámica de referencias estáticas.

---

## 📁 Estructura del repositorio

```
Taller1-POO/
├── Problema1.php
├── Problema2.php
├── Problema3.php
├── Problema4.php
├── Problema#5/
│   ├── Persona.php
│   ├── Estudiante.php
│   ├── Docente.php
│   └── index.php
├── img/
├── index.php
└── README.md
```

---

## 📚 Referencias

- Material del curso de Desarrollo Web, Ing. Irina Fong (Taller #1, POO en PHP).
- Manual de PHP, clases y objetos: https://www.php.net/manual/es/language.oop5.php
- Manual de PHP, resolución estática en tiempo de ejecución: https://www.php.net/manual/es/language.oop5.late-static-bindings.php
- Documentación de Bootstrap 5.3: https://getbootstrap.com/docs/5.3/
