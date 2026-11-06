import Estudiante from "./components/Estudiante";
import "./App.css"

export default function App(){
  const estudiantes =[
  {id:1,nombre:"Ivan", carrera:"Sistemas"},
  {id:2,nombre:"Reyna", carrera:"Comercio"},
  {id:3,nombre:"Bjork", carrera:"Tecnologias"},
  ];
  return(
    <main className="contenedor">
      <h1>Listado de Estudiantes</h1>
      <form>
        <input type="text" placeholder= "Escribe nombre" />
        <input type="text" placeholder= "Escribe nombre" />
        <button type="button">Agregar</button>
      </form>

      <h2>Estudiantes Registrados</h2>
      <ul>
        {estudiantes.map((estudiante)=>(
          <Estudiante
           Key={estudiante.id}
           estudiante={estudiante}
          />
        ))
        }
      </ul>
      <p>Total de estudiantes: {estudiantes.length}</p>
    </main>
  );
}