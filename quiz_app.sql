CREATE TABLE usuarios (
  id_usuario int(11) AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(50) NOT NULL,
  contrasenia varchar(255) NOT NULL
);


INSERT INTO usuarios (id_usuario, nombre, contrasenia) VALUES
(1, 'admin', md5('12345'));

CREATE TABLE preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta VARCHAR(255) NOT NULL,
    opciones TEXT NOT NULL,
    respuestaCorrecta INT NOT NULL
);

INSERT INTO preguntas (pregunta, opciones, respuestaCorrecta) VALUES
('¿Qué etiqueta HTML se usa para definir una celda en una tabla?', '["<table>", "<tr>", "<td>", "<th>"]', 2),
('¿Qué elemento HTML se utiliza para crear un enlace a otra página web?', '["<a>", "<link>", "<div>", "<span>"]', 0),
('¿Cuál de los siguientes es un operador aritmético en JavaScript?', '["&&", "+", "==", "||"]', 1),
('¿Qué método se usa en JavaScript para convertir un string a un número entero?', '["parseFloat()", "parseInt()", "toString()", "Number()"]', 1),
('¿Qué significa JSON en el contexto de desarrollo web?', '["JavaScript Object Notation", "JavaScript Online Notation", "Java Standard Object Notation", "JavaScript Ordered Notation"]', 0),
('¿Qué propiedad CSS se usa para cambiar el color del texto?', '["background-color", "color", "font-size", "text-align"]', 1),
('¿Qué significa el término ''responsive design'' en desarrollo web?', '["Diseño que se adapta a diferentes tamaños de pantalla", "Diseño que usa solo imágenes en alta resolución", "Diseño que se enfoca en la velocidad de carga", "Diseño que solo funciona en dispositivos móviles"]', 0),
('¿Cuál es el propósito del atributo ''alt'' en las etiquetas de imagen HTML?', '["Proporcionar un texto alternativo si la imagen no puede ser cargada", "Cambiar el color de la imagen", "Especificar el tamaño de la imagen", "Añadir un enlace a la imagen"]', 0),
('¿Cuál es el propósito del atributo ''href'' en una etiqueta <a> en HTML?', '["Especificar la URL del enlace", "Establecer el color del enlace", "Definir el estilo del enlace", "Definir el texto del enlace"]', 0),
('¿Qué etiqueta HTML se utiliza para definir una lista desordenada?', '["<ul>", "<ol>", "<li>", "<dl>"]', 0);

