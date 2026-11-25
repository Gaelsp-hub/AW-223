from flask import Blueprint

controladorAlumnoBP= Blueprint('controladorAlumno',__name__)

#ruta para arramque de servidor
@controladorAlumnoBP.route('/')
def inicio():
    return "hola soy el backend de alumno"

#Ruta para insert
@controladorAlumnoBP.route('/guardarAlumno' ,methods=['POST'])
def guardar():
    return 'se guardo el alumno'

#Ruta para consulta
@controladorAlumnoBP.route('/consultatodo')
def consultatodo():
    return 'se consulta todo'


#Ruta para actualizar
@controladorAlumnoBP.route('/actualizarAlumno', methods=['PUT'])
def actualizar():
    return 'se actualizo al alumno'

#Ruta para eliminar
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    return 'se borro al alumno'