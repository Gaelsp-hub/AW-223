from app import mysql

# Funcion para consultar todo
def selectAll():
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE state=1")
    consulta = cursor.fetchall()
    cursor.close()
    return consulta

# Funcion para consultar por ID
def selectById(id):
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE id=%s AND state=1", (id,))
    consulta = cursor.fetchone()
    cursor.close()
    return consulta

# Funcion para insertar
def insertEstudiante(nombre, carrera):
    cursor = mysql.connection.cursor()
    cursor.execute("INSERT INTO tb_alumnos(nombre,carrera) VALUES (%s,%s)", (nombre, carrera))
    mysql.connection.commit()
    cursor.close()

# Funcion para actualizar
def updateEstudiante(id, nombre, carrera):
    cursor = mysql.connection.cursor()
    cursor.execute("UPDATE tb_alumnos SET nombre=%s, carrera=%s WHERE id=%s", (nombre, carrera, id))
    mysql.connection.commit()
    cursor.close()

# Funcion para eliminar (SoftDelete)
def softDeleteEstudiante(id):
    cursor = mysql.connection.cursor()
    cursor.execute("UPDATE tb_alumnos SET state=0 WHERE id=%s", (id,))
    mysql.connection.commit()
    cursor.close()