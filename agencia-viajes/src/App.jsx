import { useState } from "react";
import { destinosData } from "./data/destinos";
import Header from "./components/Header";
import SearchBar from "./components/SearchBar";
import DestinationCard from "./components/DestinationCard";
import "./App.css";

function App() {
  const [busqueda, setBusqueda] = useState("");
  const [favoritos, setFavoritos] = useState([]);

  function cambiarFavorito(id) {
    if (favoritos.includes(id)) {
      setFavoritos(favoritos.filter((item) => item !== id));
    } else {
      setFavoritos([...favoritos, id]);
    }
  }

  const destinosFiltrados = destinosData.filter(
    (d) =>
      d.nombre.toLowerCase().includes(busqueda.toLowerCase()) ||
      d.ubicacion.toLowerCase().includes(busqueda.toLowerCase())
  );

  return (
    <div className="pagina">
      <Header favoritos={favoritos} />
      <SearchBar busqueda={busqueda} setBusqueda={setBusqueda} />

      <div className="tarjetas">
        {destinosFiltrados.map((destino) => (
          <DestinationCard
            key={destino.id}
            destino={destino}
            favoritos={favoritos}
            cambiarFavorito={cambiarFavorito}
          />
        ))}
      </div>
    </div>
  );
}

export default App;