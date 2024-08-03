// Variables para almacenar el índice de la pregunta actual y el puntaje
let indicePreguntaActual = 0;
let puntaje = 0;
const totalPreguntas = preguntas.length;

// Mostrar el número total de preguntas
document.getElementById('total-preguntas').innerText = totalPreguntas;

// Llamar a la función para mostrar la primera pregunta
mostrarPregunta();

// Función para mostrar la pregunta actual y sus opciones
function mostrarPregunta() {
  const preguntaActual = preguntas[indicePreguntaActual];

  document.getElementById('numero-pregunta').innerText = indicePreguntaActual + 1;
  document.getElementById('pregunta').innerText = preguntaActual.pregunta;

  const contenedorOpciones = document.getElementById('opciones');
  //Se vacia el contenedor para agregar nuevas opciones
  contenedorOpciones.innerHTML = '';

  // Crear botones para cada opción y añadirlos al contenedor
  for (let i = 0; i < preguntaActual.opciones.length; i++) {
    const boton = document.createElement('button');
    boton.innerText = preguntaActual.opciones[i];
    boton.onclick = () => verificarRespuesta(i, boton);
    contenedorOpciones.appendChild(boton);
  }
}

// Función para verificar la respuesta seleccionada por el usuario
function verificarRespuesta(indice, botonSeleccionado) {
  const preguntaActual = preguntas[indicePreguntaActual];
  const botones = document.querySelectorAll('#opciones button');

  // Convertir la respuesta correcta a un número entero
  const respuestaCorrecta = parseInt(preguntaActual.respuestaCorrecta, 10);

  // Verificar si la opción seleccionada es la correcta
  if (indice === respuestaCorrecta) {
    botonSeleccionado.classList.add('correcto');
    puntaje++; 
  } else {
    botonSeleccionado.classList.add('incorrecto');
  }

  // Deshabilitar todos los botones después de seleccionar una opción
  for (let i = 0; i < botones.length; i++) {
    botones[i].disabled = true;
    if (i === respuestaCorrecta) {
      botones[i].classList.add('correcto');
    }
  }
}

// Función para mostrar la siguiente pregunta o el puntaje final
function mostrarSiguientePregunta() {
  // Verificar si hay más preguntas
  if (indicePreguntaActual < totalPreguntas - 1) {
    indicePreguntaActual++;
    mostrarPregunta();
  } else {
    document.getElementById('puntaje-final').innerText = puntaje;
    document.getElementById('puntaje').style.display = 'block';
    document.getElementById('boton-reiniciar').style.display = 'block';
  }
}

// Función para reiniciar el juego
function reiniciarJuego() {
  indicePreguntaActual = 0;
  puntaje = 0;
  document.getElementById('puntaje').style.display = 'none';
  document.getElementById('boton-reiniciar').style.display = 'none';

  mostrarPregunta();
}
