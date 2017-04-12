# Coki 1.0.0 - Beta 6 (Build 73)
[![Build Status](https://travis-ci.org/ejner/Coki.svg?branch=master)](https://travis-ci.org/ejner/Coki) [![Code Climate](https://lima.codeclimate.com/github/ejner/Coki/badges/gpa.svg)](https://lima.codeclimate.com/github/ejner/Coki)

Blogs verdaderamente personales. Tema para WordPress 4.7 o superior.

**IMPORTANTE**
>Coki no dispone de sistema para notificar nuevas versiones, ni tampoco sistema para actualizar automáticamente. Por ahora, puedes ingresar a [mi blog personal](http://ejner.galaz.me/tag/coki) donde se aviso de nuevas versiones beta. 

## Caracteristicas
+ Soporte para Formatos de Entrada (**todos**, incluyendo Chat)
+ Menús personalizados
+ Imagenes destacadas
+ Listo para traducir a otros idiomas
+ Diseño adaptable
+ Código legible

Además, es muy sencillo crear tu propio tema basandote en Coki. La única dificultad es mi terquedad por tener todo documentado en español (my english is very bad, sorry)

## Requisitos
+ WordPress 4.7 o superior

¡Eso es todo! Coki **no tiene dependencias**, de forma que puedes usarlo ~~y borrarlo~~ sin miedo.

## Consideraciones antes de instalar
Puedes descargar la [Beta 5](https://github.com/ejner/Coki/releases/tag/1.0.0-beta-5) (última versión en desarrollo liberada) o descargar [la última build](https://github.com/ejner/Coki/archive/master.zip).
La diferencia entre ambas radica en su estabilidad.

**IMPORTANTE**
>Ni las builds ni las betas poseen, actualmente, un sistema que notifique nuevas versiones disponibles. No obstante, cada nueva versión beta es anunciada en [mi blog personal](http://ejner.galaz.me/tag/coki). Las builds no son avisadas de ninguna forma, pero puedes ser notificado de ellas suscribiendote al [feed del repositorio](https://github.com/ejner/Coki/commits/master.atom).

### Builds
Las builds son un conjunto de cambios que se suben de forma periodica. Incluyen correcciones de validación (para Travis-CI o CodeClimate), correcciones de errores, nuevas funciones, funciones experimentales, etc. Pueden ser inestables, carecer de estilos o causar errores, y bajo ningún concepto deberían utilizarse en entornos de producción. Puedes revisar el estado de la última build en [Travis-CI](https://travis-ci.org/ejner/Coki).

### Beta
Las versiones beta son un conjunto de builds con una hoja de ruta en común. Pueden considerarse más estables que las builds individuales, no deberían carecer de estilos y la cantidad de errores suele ser baja. Por su parte, puede ser total o parcialmente diferente a la beta anterior, según la cantidad de builds que agrupe.

## Registro de cambios
*Nota*: el registro de cambios también está disponible en los comentarios de cada build.

## Build 73
- Inicio del diseño definitivo
- Integrado normalize.css en el CSS del sitio
- Eliminada carpeta `less` (incluyendo su contenido)
- Creado (e ignorado por `.gitignore`) `ROADMAP.md`
- Eliminada carpeta `libs/normalize` (incluyendo su contenido)

### Build 72
- Inicio del diseño final del tema.
- Inicio de la incorporación de Normalize.css dentro de style.css
- Modificado README.md para reflejar mejor el desarrollo del tema.

## Hoja de ruta
>La hoja de ruta suele cambiar con el lanzamiento de una nueva versión.

### 1.0.0 - Beta 6 *(actualmente en desarrollo)*
1. Añadir plantillas faltantes
2. Ajustes de diseño
3. Ajuste de funciones
4. Soporte para opciones personalizadas

### 1.0.0 - RC1
1. Pulir todo lo humanamente pulible

### 1.0.0 - Final
1. Versión final

## Licencia
Coki es [software libre](https://www.gnu.org/philosophy/free-sw.es.html) y se distribuye bajo licencia [GNU General Public License v2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html). Goce la libertad (pero respete la licencia).

## Librerías de terceros
Coki utiliza librerías creadas por terceros, los cuales han liberado generosamente sus creaciones para todos nosotros.

+ [HTML5 Blank](http://html5blank.com/) creado por [Todd Motto](https://toddmotto.com/), bajo licencia [MIT](https://github.com/toddmotto/html5blank/blob/master/LICENSE.md)
+ [Normalize.css](https://necolas.github.io/normalize.css/) creado por [Nicolas Gallagher](http://nicolasgallagher.com/), bajo licencia [MIT](https://github.com/necolas/normalize.css/blob/master/LICENSE.md)
+ [Google Material Icons](https://design.google.com/) creado por Google, bajo licencia [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/)
+ [Modernizr](https://modernizr.com) creado por Modernizr, bajo licencia [MIT](https://github.com/Modernizr/Modernizr/blob/master/LICENSE)

Además, las funciones `coki_chat()` y `coki_chat_get_id()` están basadas en el artículo [Post Formats: Chat](http://justintadlock.com/archives/2012/08/21/post-formats-chat) publicado por Justin Tadlock. Dichas funciones hacen posible que los formatos "Chat" dispongan de etiquetas `<div>` para facilitar su manejo de estilos.

Por último, los iconos Google Material Icons fueron obtenidos desde [IcoMoon App](https://icomoon.io/app).