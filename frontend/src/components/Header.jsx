import { useState } from 'react';

function Header() {
  // Este es el "interruptor" que controla si el menú está abierto o cerrado
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  // Función para abrir/cerrar el menú
  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
  };

  return (
    <>
      {/* BARRA SUPERIOR */}
      <header>
        <div className="menu-icon" onClick={toggleMenu}>☰</div>
        <div className="logo-container">
          <div className="logo-placeholder">
            [LOGO EL CONCONINO]
          </div>
        </div>
        <div className="user-icon">👤</div>
      </header>

      {/* FONDO OSCURO (Se muestra solo si el menú está abierto) */}
      {isMenuOpen && (
        <div className="side-menu-overlay" onClick={toggleMenu}></div>
      )}

      {/* MENÚ LATERAL DESLIZANTE */}
      <div className={`side-menu ${isMenuOpen ? 'open' : ''}`}>
        <div className="side-menu-header">
          <h2>Menú</h2>
          <button className="close-btn" onClick={toggleMenu}>✖</button>
        </div>
        
        <nav className="side-menu-links">
          <a href="#">🏠 Inicio</a>
          <a href="#">🎟️ Comprar Tickets</a>
          <a href="#">🔍 Verificar mis Tickets</a>
          <a href="#">📄 Bases Legales</a>
          <a href="#">💬 Contacto / Ayuda</a>
        </nav>

        <div className="side-menu-footer">
          <p>Síguenos en redes</p>
          <a href="#">📷 @ElConconino</a>
        </div>
      </div>
    </>
  );
}

export default Header;