import React from 'react';

function Verificacion() {
  return (
    <div className="verify-wrapper">
      <header>
        <div className="logo-placeholder">
          [LOGO EL CONCONINO]
        </div>
        <div className="header-links">
          <a href="#">← Volver a la tienda</a>
          <a href="#">Ayuda / Contacto</a>
        </div>
      </header>

      <div className="verify-container">
        <h1>Verifica tus <span>Tickets y Fondos</span></h1>
        <p className="subtitle">
          Ingresa el correo electrónico con el que realizaste tu compra para ver tus números de sorteo y descargar tus diseños.
        </p>

        {/* Mensaje de Error (Simulado) */}
        <div className="error-message" id="error-msg">
          ⚠️ Correo no encontrado o inválido. Asegúrate de escribirlo exactamente como lo usaste en tu compra.
        </div>

        <div className="search-box">
          <input type="email" placeholder="ejemplo@correo.com" id="email-input" defaultValue="juanperez@correo.com" />
          <button className="btn-search">Buscar</button>
        </div>

        {/* Resultados */}
        <div className="user-results">
          <div className="welcome-msg">
            Hola, <strong>Juan Pérez</strong>. ¡Aquí está tu colección!
          </div>

          <div className="dashboard-grid">
            {/* Columna Izquierda: Tickets */}
            <div className="tickets-section">
              <h3>🎟️ Mis Tickets para el Sorteo</h3>
              <p style={{ fontSize: '12px', color: '#aaa', marginBottom: '20px' }}>
                Estos números están registrados a tu nombre para el sorteo certificado.
              </p>

              <div className="ticket-card">
                <div>
                  <div style={{ fontSize: '10px', color: 'var(--text-muted)', textTransform: 'uppercase' }}>Ticket #1</div>
                  <div className="ticket-number">NNO-8472</div>
                </div>
                <div className="ticket-status">Válido</div>
              </div>

              <div className="ticket-card">
                <div>
                  <div style={{ fontSize: '10px', color: 'var(--text-muted)', textTransform: 'uppercase' }}>Ticket #2</div>
                  <div className="ticket-number">NNO-9105</div>
                </div>
                <div className="ticket-status">Válido</div>
              </div>

              <div className="ticket-card">
                <div>
                  <div style={{ fontSize: '10px', color: 'var(--text-muted)', textTransform: 'uppercase' }}>Ticket #3</div>
                  <div className="ticket-number">NNO-3391</div>
                </div>
                <div className="ticket-status">Válido</div>
              </div>
            </div>

            {/* Columna Derecha: Descargas */}
            <div className="downloads-section">
              <h3>📱 Mis Fondos Digitales</h3>
              <p style={{ fontSize: '12px', color: '#aaa', marginBottom: '20px' }}>
                Descarga tus fondos en alta resolución para tu celular.
              </p>

              <div className="download-item">
                <div className="thumb-placeholder">
                  [IMG FONDO 1]
                </div>
                <div className="download-info">
                  <h4>Diseño Épico #01</h4>
                  <p>Resolución 4K (Vertical)</p>
                  <a href="#" className="btn-download">⬇ Descargar Imagen</a>
                </div>
              </div>

              <div className="download-item">
                <div className="thumb-placeholder">
                  [IMG FONDO 2]
                </div>
                <div className="download-info">
                  <h4>Diseño Épico #02</h4>
                  <p>Resolución 4K (Vertical)</p>
                  <a href="#" className="btn-download">⬇ Descargar Imagen</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Verificacion;