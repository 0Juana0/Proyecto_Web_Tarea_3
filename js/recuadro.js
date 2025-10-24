(function(){
  const select = document.getElementById('rutaSelect');
  const detalle = document.getElementById('detalleRuta');
  if (!select || !detalle) return;

  function mostrarPrecioYDetalles() {
    const opt = select.options[select.selectedIndex];
    if (!opt || opt.value === "") {
      detalle.innerHTML = 'Seleccione una ruta para ver el precio';
      return;
    }
    const precio = opt.dataset.precio;
    const precioNum = precio ? Number(precio) : NaN;
    detalle.innerHTML = precioNum
      ? '<strong>Precio</strong>: $' + precioNum.toLocaleString('es-CO')
      : 'Precio no disponible';
  }

  select.addEventListener('change', mostrarPrecioYDetalles);
  mostrarPrecioYDetalles();
})();
