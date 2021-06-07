# Mutation dna test

Prueba de mutacion en adn en el que empleo PHP como lenguaje de backend con el framework de laravel lumen para microservicios, en este caso un API con un metodo GET y uno POST

##Algoritmos

Trate de crear los algoritmos desde 0 ya que pude utilizar algunos que provee PHP pero no me parecio que fuera la mejor manera ya que tengo la sensacion de que quieren ver como me desenvuelvo creando algoritmos

## Metodos

la ruta principal es {URL}/api/v1/dna

El metodo GET - {URL}/api/v1/dna/stats devuelve la cantidad de mutaciones y no mutaciones registradas en la base de datos asi como un ratio
El metodo POST - {URL}/api/v1/dna/mutations permite la inserccion de datos el cual espera como parametro un array con el nombre dna Ejemplo:
{
    "dna": ["ATGCGA", "CAGTGC", "TTATTT", "AGACGG", "GCGTCA", "TCACTG"]
}

## Base de datos

Para esta prueba decidi crear una base de datos con sqlite ya que solo se requeria de una tabla para guardar la informacion

## adicionales

Como adicional monte todo sobre un contenedor Docker para que se levante con un solo comando todo el proyecto ya no seria necesario configurar nada adicional solamente correr el comando: docker-compose up

## Nube

La nube utilizada fue Google Cloud (Compute Engine) ya que AWS no me permitio usarlo por conflicto con mi tarjeta de debito

##Proyecto corriendo

El proyecto actualmente corriendo en la siguiente direccion: https://35.192.16.71/