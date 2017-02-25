# Coki 1.0.0 - Beta 5 (en desarrollo)
[![Build Status](https://travis-ci.org/ejner/Coki.svg?branch=master)](https://travis-ci.org/ejner/Coki)
Tema para WordPress 4.7+. Simple, elegante, adaptable.

**IMPORTANTE**
>Coki está actualmente en desarrollo (periodicamente se suben nuevas versiones), además de no disponer (por ahora) de formas para actualizar o avisar de nuevas versiones. No obstante, cada nueva versión será anunciada en [mi blog personal](http://ejner.galaz.me/tag/coki), donde también puedes ver a Coki en todo su esplendor.

## Caracteristicas
+ Soporte para Formatos de Entrada (**todos**, incluyendo Chat)
+ Menús personalizados
+ Imagenes destacadas
+ Listo para traducir a otros idiomas
+ Diseño adaptable
+ Código legible
+ Barra para compartir artículos en redes sociales
+ No depende de plugins para funcionar correctamente

Además, es muy sencillo crear tu propio tema basandote en Coki. La única dificultad es mi terquedad por tener todo documentado en español (my english is very bad, sorry)

## Requisitos
+ WordPress 4.7 o superior

¡Eso es todo! Coki **no tiene dependencias**, de forma que puedes usarlo ~~y borrarlo~~ sin miedo.

## Licencia
Coki es [software libre](https://www.gnu.org/philosophy/free-sw.es.html) y se distribuye bajo licencia [GNU General Public License v2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html). Goce la libertad (pero respete la licencia).

## Hoja de ruta
### 1.0.0 - Beta 5 *(actualmente en desarrollo)*
- [ ] 1. Mejorar el código para aprobar integraciones continuas
 * Es primera vez que incluyo un proyecto en servicios como Travis CI y es sorprendente la cantidad de errores que uno comete sin saberlo. La próxima beta tendrá énfasis en mejorar cada error que evito que Coki pasara los test de integración continua y, sobre todo, evitar cometerlos nuevamente.
- [ ] 2. Añadir buscador
- [x] 3. Finalizar diseño de la paginación
- [ ] 4. Finalizar diseño adaptable (tal vez lo cambie por "mobile first")
- [ ] 5. Añadir comentarios (funciones y diseño)
- [ ] 6. Añadir plantillas

### 1.0.0 - Beta 6
1. Versión reservada para cosas maravillosas

### 1.0.0 - RC1
1. Pulir todo lo humanamente pulible

### 1.0.0 - Final
1. Versión final

## Terceros

### Librerías
Algo hermoso del software libre es la posibilidad de tomar el trabajo creado por otros, adaptarlo, y crear cosas nuevas. Coki utiliza librerías creadas por terceros. El nombre, su autor y su licencia se citan acontinuación:

+ [HTML5 Blank](http://html5blank.com/) creado por [Todd Motto](https://toddmotto.com/), bajo licencia [MIT](https://github.com/toddmotto/html5blank/blob/master/LICENSE.md)
+ [Normalize.css](https://necolas.github.io/normalize.css/) creado por [Nicolas Gallagher](http://nicolasgallagher.com/), bajo licencia [MIT](https://github.com/necolas/normalize.css/blob/master/LICENSE.md)
+ [Google Material Icons](https://design.google.com/) creado por Google, bajo licencia [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/)
+ [Modernizr](https://modernizr.com) creado por Modernizr, bajo licencia [MIT](https://github.com/Modernizr/Modernizr/blob/master/LICENSE)

### Porciones de código
Además, Coki utiliza porciones de código (es decir, partes pequeñitas de algo más grande) creadas por terceros. Su nombre, autor, licencia (si existe) y donde se utilizan, se citan acontinuación:

+ [TwentySeventeen](https://wordpress.org/themes/twentyseventeen/) creado por [the WordPress team](https://wordpress.org/), bajo licencia [GNU General Public License v2](http://www.gnu.org/licenses/gpl-2.0.html). 
 + Se utiliza el archivo ``inc/back-compat.php`` para evitar que Coki se utilice en versiones inferiores a WordPress 4.7
+ [Post Formats: Chat](http://justintadlock.com/archives/2012/08/21/post-formats-chat) publicado por Justin Tadlock
 + Se utiliza para encapsular los Formato de Entrada en diferentes ``<div>`` y darle estilos de forma más sencilla.

### Software utilizado
Finalmente, para crear Coki he utilizado los siguientes programas y/o servicios. No era necesario que los citara, pero lo haré por que puedo. Su nombre y que es, se citan acontinuación:
+ Notepad++: excelente editor
+ Visual Studio Code: otro excelente editor
+ IcoMoon.com: para crear fuentes en base a "icon fonts"
+ AppServ: servidor local con Apache, MySQL, PHP y phpMyAdmin
+ SourceTree: estupendo cliente GIT
+ Mozilla Firefox: el mejor navegador de la tierra y del valle de las sombras
+ WordPress: un gran CMS que insisten en categorizarlo como gestor de blogs (aunque eso es lo que principalmente hace)