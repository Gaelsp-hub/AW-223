function Header({ favoritos }) {
  return (
    <div className="encabezado">
      <h1>Agencia de Viajes UPQ</h1>
      <p>Favoritos: {favoritos.length}</p>
    </div>
  );
}

export default Header;