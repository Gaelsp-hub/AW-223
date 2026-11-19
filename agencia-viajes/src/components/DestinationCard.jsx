import { useState } from "react";

function DestinationCard({ destino, favoritos, cambiarFavorito }) {
  const [mostrarInfo, setMostrarInfo] = useState(false);
  const esFavorito = favoritos.includes(destino.id);

  return (
    <div className="tarjeta">
      <img src={destino.imagen} alt={destino.nombre} width="200" />
      <h3>{destino.nombre}</h3>
      <p>{destino.ubicacion}</p>
      <p>{destino.precio}</p>

      {mostrarInfo && <p>{destino.descripcion}</p>}

      <button onClick={() => setMostrarInfo(!mostrarInfo)}>
        {mostrarInfo ? "Ocultar" : "Detalles"}
      </button>

      <button onClick={() => cambiarFavorito(destino.id)}>
        {esFavorito ? "Quitar favorito" : "Favorito"}
      </button>
    </div>
  );
}

export default DestinationCard;