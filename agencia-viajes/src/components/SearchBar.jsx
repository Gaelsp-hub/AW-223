function SearchBar({ busqueda, setBusqueda }) {
  return (
    <input
      type="text"
      placeholder="Buscar..."
      value={busqueda}
      onChange={(e) => setBusqueda(e.target.value)}
    />
  );
}

export default SearchBar;