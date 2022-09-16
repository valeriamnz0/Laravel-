## Nombre del proyecto

Sistema Administrativo SPT 

## Integrantes 

- Ana Salas Palma.
- Kevin Bermúdez Artavia.
- Kymmer Sharid Madrigal Villalobos.
- Valeria Matamoros Navarro.


## Descripción del proyecto,

El proyecto presenta una opción procedural para la creación, edición y seguimiento de proyectos de instalación de equipos de seguridad. Para la fecha de la creación de este documento, la gestión de proyectos da con su objetivo, pero puede obtimizarse aún más. Con la correcta organización de interfaces y control de datos se puede llegar a un software moderno que permita a los usuarios controlar los planes más eficaz y eficientemente. 


## ¿Cómo instalar el repositorio?

Antes de instalar el repositorio será necesario cumplir con los siguientes software:

- **[Composer](https://getcomposer.org/)**: Preferiblemente su más reciente versión.
- **[PHP](https://www.php.net/downloads.php)**: En su versión 7.3.28.
- **[Node JS](https://nodejs.org/es/)**: Preferiblemente su más reciente versión.
- Windows: Solamente se ha verificado con Windows 10, pero 8, 8.1 u 11, así como Windows Server 2016 en adelante deberían ser soportados. También distribuciones Linux como Ubuntu y Debian debrían funcionar. 
- **[Git](https://git-scm.com/downloads)**: Preferiblemente su más reciente versión.
- **[Sourcetree](https://www.sourcetreeapp.com/)**:  Es opcional si se sabe utilizar la línea de comandos de Git. Es preferiblemente su más reciente versión. En este caso, utilizaremos Sourcetree para realizar la clonación.
- **[Visual Studio Code](https://code.visualstudio.com/)**:  Es opcional si se deasea utilizar una interfaz de edición de código para revisar y/o alterar el código. También Visual Studio, Atom, Notepad++ y Sublime Text (por mencionar algunos) funcionan.

- Adicionalmente, se necesitará una cuenta en bitbucket para realizar la clonación.

Una vez conseguido el link para hacer la clonación del proyecto, se procede abrir el link el cual conducirá al repositorio en Bitbucket. Con la opción "clonar" escogeremos "clonar con Bitbucket" el cual nos abrirá la aplicación de Bitbucket y nos pedirá cual será el origen (se llenará automáticamente y no será necesario cambiar nada en esta opción), la carpeta donde deseemos realizar la clonación localmente (atención, no debe ingresarse ninguna dirección de alguna ruta en la nube, como lo es OneDrive de Microsoft.) Y por último, se ingresará el nombre de nuestro repositorio. Este nombre es solamente lógico y no significará nada más que para representar nuestra ruta de clonación más fácilmente. Se continúa con la clonación después de esto.

Ya que el proyecto esté clonado, se debe abrir la ruta ya sea con el explorador de Windows o con CMD. 

→ Si se abre la ruta con el explorador de Windows, se debe ingresar "cmd" en la barra de direcciones de la ventana. Esto abrirá una ventana CMD que ya está enrutada a la carpeta que escogimos.

Luego de esto se ingresa el comando "composer create-project" (sin las comillas) en la misma carpeta. Esto descargará las dependencias que hacen falta, ya que el gitingnore omite algunas carpetas de importancia.
Seguidamente, se ingresará el comando "php artisan serve" (sin las comillas) para iniciar un servidor web que viene con el proyecto. Esto nos permite abrir la interfaz del proyecto en un navegador web con la url que aparecerá en la ventana CMD.
